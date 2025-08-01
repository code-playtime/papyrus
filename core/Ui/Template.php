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
            $viewPath = base_path("modules/" . $this->module . "/views/" . $this->path . ".php");

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

        public function includes(string $path, array $args = [], ?string $module = "Main") {
            $viewPath = base_path("modules/" . $module . "/views/" . $path . ".php");

            if(!file_exists($viewPath)) {
                throw new Exception("Include file not found :: " . $viewPath);
            }

            extract($args);
            include $viewPath;
        }
    }
