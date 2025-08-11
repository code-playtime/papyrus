<?php

namespace Papyrus\Cli\Commands;

use Papyrus\Cli\Utils\GeneralTemplate as Template;
use Papyrus\Cli\Commands\MakeController;
use Papyrus\Cli\Traits\Loggable;

class MakeModule
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

        $moduleName = $args['name'];
        if (!$moduleName) {
            $this->error("Module name is not present.");
            return;
        }

        $modulePath = $this->path . '/modules/' . $moduleName;
        $this->createModule($modulePath, $moduleName);
    }

    private function createModule($modulePath, $moduleName)
    {
        if (is_dir($modulePath)) {
            $this->info("Module {$moduleName} already exists.");
            return;
        }

        mkdir($modulePath, 0755, true);
        mkdir("{$modulePath}/views", 0755, true);

        $controllerName = $moduleName . 'Controller';

        $makeController = new MakeController($this->path, [
            "name={$controllerName}",
            "module={$moduleName}"
        ]);
        $makeController->execute();

        $routerContent = Template::router($moduleName);
        file_put_contents("{$modulePath}/routes.php", $routerContent);

        $this->success("Module {$moduleName} is created successfully in src/modules.");
        $this->info("Add module name {$moduleName} to App/Config/modules.php to activate the module.");
    }
}
