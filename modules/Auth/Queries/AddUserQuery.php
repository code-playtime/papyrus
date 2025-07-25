<?php

    namespace Module\Auth\Queries;

    use Devyuha\Lunaris\Facades\Query;

    class AddUserQuery extends Query {
        public function sql() {
            return <<<SQL
                INSERT INTO users (name, username, email, password, role) VALUES (:name, :username, :email, :password, :role);            
            SQL;
        }
    }
