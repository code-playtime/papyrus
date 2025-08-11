<?php

namespace Papyrus\Cli\Commands;

use Papyrus\Cli\Utils\NovaTemplate as Template;
use Papyrus\Cli\Traits\Loggable;

class MakeCommand
{
    use Loggable;

    private string $path;
    private array $args;

    public function __construct(string $path, array $args)
    {
        $this->path = $path;
        $this->args = $args;
    }

    public function execute(): void
    {
        $projectRoot = getcwd();
        $args = fetchArgs($this->args);

        $commandName = $args['name'];
        $moduleName = $args['module'] ?? 'Main';

        $content = Template::command($moduleName, $commandName);
        $modulePath = $projectRoot . "/modules/" . $moduleName;
        $commandFolderPath = $this->checkCommandsFolder($modulePath);
        if ($commandFolderPath) {
            $this->generate($commandName, $content, $commandFolderPath);
        }
    }

    private function checkCommandsFolder($modulePath)
    {
        $commandFolderPath = $modulePath . "/Commands";

        if (!is_dir($commandFolderPath)) {
            if (mkdir($commandFolderPath, 0777, true)) {
                $this->success("Commands folder has been created in {$modulePath}");
            } else {
                $this->error("Failed to create Commands folder in {$modulePath}");
                return false;
            }
        }

        return $commandFolderPath;
    }

    private function generate($name, $content, $path)
    {
        $commandFileName = $name . ".php";
        $commandFilePath = $path . "/" . $commandFileName;
        if (file_exists($commandFilePath)) {
            $this->info("Command: {$name} already exists in {$path}");
            return false;
        }

        file_put_contents($commandFilePath, $content);

        $this->success($name . " has been created inside " . $path);
    }
}
