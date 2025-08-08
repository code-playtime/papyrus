<?php

namespace Papyrus\Cli\Commands;

use Papyrus\Cli\Utils\GeneralTemplate as Template;
use Papyrus\Cli\Traits\Loggable;

class MakeController
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
        $args = Template::getArgs($this->args);

        $controllerName = $args['name'];
        $moduleName = $args['module'] ?? 'Main';

        $content = Template::controller($moduleName, $controllerName);
        $modulePath = $projectRoot . "/modules/" . $moduleName;
        $controllerFolderPath = $this->checkControllersFolder($modulePath);
        if ($controllerFolderPath) {
            $this->generate($controllerName, $content, $controllerFolderPath);
        }
    }

    private function checkControllersFolder($modulePath)
    {
        $folderPath = $modulePath . "/Controllers";

        if (!is_dir($folderPath)) {
            if (mkdir($folderPath, 0777, true)) {
                $this->success("Controllers folder has been created in {$modulePath}.");
            } else {
                $this->error("Failed to create Controllers folder in {$modulePath}.");
                return false;
            }
        }

        return $folderPath;
    }

    private function generate($name, $content, $path)
    {
        $controllerFileName = $name . ".php";
        $controllerFilePath = $path . "/" . $controllerFileName;
        if (file_exists($controllerFilePath)) {
            $this->info("{$name} already exists in {$path}");
            return false;
        }

        file_put_contents($controllerFilePath, $content);

        $this->success($name . " has been created in " . $path);
    }
}
