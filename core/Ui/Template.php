<?php

    namespace Devyuha\Lunaris\Ui;

    use Devyuha\Lunaris\Ui\View;

    class Template {
        private $path;
        private $args;
        private $module;

        public function __construct(string $path, array $args = []) {
            $this->path = $path;
            $this->args = $args;
        }

        public function module($module = "Main") {
            $this->module = $module;
            return $this;
        }

        public function render() {
            $viewPath = $this->getPath($this->path, $this->module);

            if(!file_exists($viewPath)) {
                throw new Exception("View file not found :: " . $viewPath);
            }

            $this->args["template"] = new View($this);

            extract($this->args);
            ob_start();
            include($viewPath);
            $var = ob_get_contents();
            ob_end_clean();
            return $var;
        }

        public function includes(string $path, array|null $args = null, ?string $module = "Main") {
            $viewPath = $this->getPath($path, $module);

            if(!file_exists($viewPath)) {
                throw new Exception("Include file not found :: " . $viewPath);
            }
            $args = $args ?? [];
            $args["template"] = $this->args["template"];
            extract($args);
            include($viewPath);
        }

        private function getPath($path, $module) {
            $viewPath = base_path("modules/" . $module . "/views/" . $path . ".php");

            return $viewPath;
        }
    }
