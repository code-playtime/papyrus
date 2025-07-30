<?php

    namespace Devyuha\Lunaris\Facades;

    class Logger {

        protected static function write($level, $message) {
            $date = date("Y-m-d H:i:s");
            $formatted = "[$date] [$level] : $message" . PHP_EOL;
            $logFile = base_path("logger.log");

            file_put_contents($logFile, $formatted, FILE_APPEND | LOCK_EX);
        }

        public static function error($message) {
            self::write("ERROR", $message);
        }

        public static function warning($message) {
            self::write("WARNING", $message);
        }

        public static function info($message) {
            self::write("INFO", $message);
        }

        public static function debug($message) {
            self::write("DEBUG", $message);
        }
    }
