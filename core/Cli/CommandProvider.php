<?php

namespace Papyrus\Cli;

class CommandProvider
{
    public function getCommands()
    {
        return [
            // Make commands
            "make:controller" => \Papyrus\Cli\Commands\MakeController::class,
            "make:module" => \Papyrus\Cli\Commands\MakeModule::class,
            "make:mail" => \Papyrus\Cli\Commands\MakeMail::class,
            "make:command" => \Papyrus\Cli\Commands\MakeCommand::class,
            "make:query" => \Papyrus\Cli\Commands\MakeQuery::class,
            "make:request" => \Papyrus\Cli\Commands\MakeRequest::class,
            "make:middleware" => \Papyrus\Cli\Commands\MakeMiddleware::class,

            // Application key generator
            "key:generate" => \Papyrus\Cli\Commands\KeyGenerate::class,
        ];
    }
}
