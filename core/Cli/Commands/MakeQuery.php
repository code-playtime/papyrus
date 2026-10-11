<?php

namespace Papyrus\Cli\Commands;

use Papyrus\Cli\Utils\PdoTemplate as Template;
use Papyrus\Cli\Traits\Loggable;

class MakeQuery
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
        $args = Template::getArgs($this->args);
        $queryName = $args['name'];
        $moduleName = $args['module'] ?? 'Main';

        $content = Template::query($moduleName, $queryName);
        $modulePath = $this->path . "/modules/" . $moduleName;
        $queryFolderPath = $this->checkQueriesFolder($modulePath);
        if ($queryFolderPath) {
            $this->generate($queryName, $content, $queryFolderPath);
        }
    }

    private function checkQueriesFolder($modulePath)
    {
        $folderPath = $modulePath . "/Queries";

        if (!is_dir($folderPath)) {
            if (mkdir($folderPath, 0777, true)) {
                $this->success("Mails folder has been created in {$modulePath}.");
            } else {
                $this->error("Failed to create Mails folder in {$modulePath}.");
                return false;
            }
        }

        return $folderPath;
    }

    private function generate($name, $content, $path)
    {
        $queryFileName = $name . ".php";
        $queryFilePath = $path . "/" . $queryFileName;
        if (file_exists($queryFilePath)) {
            $this->info("{$name} already exists in {$path}");
            return false;
        }

        file_put_contents($queryFilePath, $content);

        $this->success($name . " has been created in " . $path);
    }
}
