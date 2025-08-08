<?php

namespace Papyrus\Cli\Commands;

use Papyrus\Cli\Utils\SecurityTemplate as Template;
use Papyrus\Cli\Traits\Loggable;

class MakeRequest
{
    use Loggable;

    private string $path;
    private array $args;

    public function __construct(string $path, array $args)
    {
        $this->path = $path;
        $this->args = $args;
    }

    public function execute()
    {
        $args = Template::getArgs($this->args);

        $requestName = $args['name'] ?? null;
        $moduleName = $args['module'] ?? 'Main';

        $content = Template::request($moduleName, $requestName);
        $modulePath = $this->path . "/modules/" . $moduleName;
        $requestsFolderPath = $this->checkRequestsFolder($modulePath);
        if ($requestsFolderPath) {
            $this->generate($requestName, $content, $requestsFolderPath);
        }
    }

    private function checkRequestsFolder($modulePath)
    {
        $folderPath = $modulePath . "/Requests";

        if (!is_dir($folderPath)) {
            if (mkdir($folderPath, 0777, true)) {
                $this->success("Requests folder has been created in {$modulePath}.");
            } else {
                $this->error("Failed to create Requests folder in {$modulePath}.");
                return false;
            }
        }

        return $folderPath;
    }

    private function generate($name, $content, $path)
    {
        $requestFileName = $name . ".php";
        $requestFilePath = $path . "/" . $requestFileName;
        if (file_exists($requestFilePath)) {
            $this->info("{$name} already exists in {$path}");
            return false;
        }

        file_put_contents($requestFilePath, $content);

        $this->success($name . " has been created in " . $path);
    }
}
