<?php

    namespace Papyrus\Providers;

    class SecurityProvider {
        public function getCommands() {
            return [
                "key:generate" => \Papyrus\Commands\KeyGenerate::class,
                "make:request" => \Papyrus\Commands\MakeRequest::class,
                "make:middleware" => \Papyrus\Commands\MakeMiddleware::class
            ];
        }
    }
