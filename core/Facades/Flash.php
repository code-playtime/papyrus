<?php

    namespace Papyrus\Facades;

    class Flash
    {
        public static function make($type, $array) {
            $key = "flash-" . $type;
            $array = json_encode($array);
            $_SESSION[$key] = $array;
            return;
        }

        public static function render($type, $html) {
            $key = "flash-" . $type;

            if(isset($_SESSION[$key]) && !empty($_SESSION[$key]))
            {
                $data = json_decode($_SESSION[$key], true);
                unset($_SESSION[$key]);

                if(isset($data)) {
                    if(is_array($data) && count($data) > 0) {
                        foreach($data as $index => $item) {
                            echo str_replace("@message", $item, $html);
                        }
                    } else {
                        echo str_replace("@message", $data, $html);
                    }
                }
            }
            return false;
        }
    }
