<?php

    namespace Papyrus\Facades;

    use PDO as DB;
    use PDOException;

    use Papyrus\Utils\Config;

    class Pdo {
        private static $instance = null;
        private $connection;

        private function __construct() {
            $data = Config::init()->data();
            $dsn = Config::getConnectionString($data);
            $username = $data["db_user"];
            $password = $data["db_password"];

            try {
                $this->connection = new DB($dsn, $username, $password);
                $this->connection->setAttribute(DB::ATTR_ERRMODE, DB::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public static function getInstance() {
            if(self::$instance === null) {
                self::$instance = new Pdo();
            }

            return self::$instance->connection;
        }

        public static function execute(Query $query) {
            $sql = $query->sql();
            $stmt = self::getInstance()->prepare($sql);

            $args = $query->getArgs() ?? [];
            if(count($args) > 0) {
                foreach($args as $key => $value) {
                    $stmt->bindValue($key, $value, is_int($value) ? DB::PARAM_INT : DB::PARAM_STR);
                }
            }
            $stmt->execute();

            $type = strtoupper(trim(strtok(ltrim($sql), " ")));

            switch ($type) {
                case "SELECT" :
                    $query->setData($stmt->fetchAll(DB::FETCH_ASSOC));
                    break;
                case "SHOW" :
                    $query->setData($stmt->fetchAll(DB::FETCH_ASSOC));
                    break;
                case "INSERT" :
                    $query->setId(self::getInstance()->lastInsertId());
                    break;
                default :
                    $query->setAffectedRows($stmt->rowCount());
                    break;
            }

            return $query;
        }

        public static function transaction() {
            self::getInstance()->beginTransaction();
        }

        public static function commit() {
            self::getInstance()->commit();
        }

        public static function rollback() {
            self::getInstance()->rollBack();
        }
    }
