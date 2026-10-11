<?php

namespace Papyrus\Vli\Commands;

use Papyrus\Cli\Utils\GeneralTemplate as Template;
use Papyrus\Cli\Traits\Loggable;

class MakeMiddleware
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

        $middlewareName = $args['name'];
        $moduleName = $args['module'] ?? 'Main';

        $content = Template::middleware($moduleName, $middlewareName);
        $modulePath = $projectRoot . "/modules/" . $moduleName;
        $middlewareFolderPath = $this->checkMiddlewaresFolder($modulePath);
        if ($middlewareFolderPath) {
            $this->generate($middlewareName, $content, $middlewareFolderPath);
        }
    }

    private function checkMiddlewaresFolder($modulePath)
    {
        $folderPath = $modulePath . "/Middlewares";

        if (!is_dir($folderPath)) {
            if (mkdir($folderPath, 0777, true)) {
                $this->success("Middlewares folder has been created in {$modulePath}.");
            } else {
                $this->error("Failed to create Middlewares folder in {$modulePath}.");
                return false;
            }
        }

        return $folderPath;
    }

    private function generate($name, $content, $path)
    {
        $middlewareFileName = $name . ".php";
        $middlewareFilePath = $path . "/" . $middlewareFileName;
        if (file_exists($middlewareFilePath)) {
            $this->info("{$name} already exists in {$path}");
            return false;
        }

        file_put_contents($middlewareFilePath, $content);

        $this->success($name . " has been created in " . $path);
    }
}
