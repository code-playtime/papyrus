<?php

    namespace Papyrus\Providers;

    class MailerProvider {
        public function getCommands() {
            return [
                "make:mail" => \Papyrus\Commands\MakeMail::class
            ];
        }
    }
