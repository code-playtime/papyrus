<?php

    namespace Papyrus\Providers;

    class FrameworkProvider
    {
        public function getCommands() {
            return [
                "make:controller" => \Papyrus\Commands\MakeController::class,
                "make:module" => \Papyrus\Commands\MakeModule::class
            ];
        }
    }
