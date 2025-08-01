<?php

    namespace Papyrus\Providers;

    class PdoProvider {
        public function getCommands() {
            return [
                "make:query" => \Papyrus\Commands\MakeQuery::class
            ];
        }
    }
