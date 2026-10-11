<?php

namespace Papyrus\Cli\Commands;

use Papyrus\Cli\Utils\MailTemplate as Template;
use Papyrus\Cli\Traits\Loggable;

class MakeMail
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
        $mailName = $args['name'];
        $moduleName = $args['module'] ?? 'Main';

        $content = Template::mail($moduleName, $mailName);
        $modulePath = $this->path . "/modules/" . $moduleName;
        $mailFolderPath = $this->checkMailsFolder($modulePath);
        if ($mailFolderPath) {
            $this->generate($mailName, $content, $mailFolderPath);
        }
    }

    private function checkMailsFolder($modulePath)
    {
        $folderPath = $modulePath . "/Mails";

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
        $mailFileName = $name . ".php";
        $mailFilePath = $path . "/" . $mailFileName;
        if (file_exists($mailFilePath)) {
            $this->info("{$name} already exists in {$path}");
            return false;
        }

        file_put_contents($mailFilePath, $content);

        $this->success($name . " has been created in " . $path);
    }
}
