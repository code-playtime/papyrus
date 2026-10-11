<?php

namespace Papyrus\Support\Facades;

class Logger
{
    private static $instance = null;

    public static function init()
    {
        if (self::$instance === null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    protected function write($level, $message)
    {
        $date = date("Y-m-d H:i:s");
        $formatted = "[$date] [$level] : $message" . PHP_EOL;
        $logFile = base_path("logger.log");

        file_put_contents($logFile, $formatted, FILE_APPEND | LOCK_EX);
    }

    public function error($message)
    {
        $this->write("ERROR", $message);
    }

    public function warning($message)
    {
        $this->write("WARNING", $message);
    }

    public function info($message)
    {
        $this->write("INFO", $message);
    }

    public function debug($message)
    {
        $this->write("DEBUG", $message);
    }
}
