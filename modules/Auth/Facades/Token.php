<?php

    namespace Module\Auth\Facades;

    class Token {
        public static function generate($data = []) {
            $data = json_encode($data);
            $data = base64_encode($data);

            return $data;
        }

        public static function fetch($token) {
            $token = base64_decode($token);
            $token = json_decode($token, true);

            return $token;
        }
    }
