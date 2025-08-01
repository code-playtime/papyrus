<?php

    namespace Devyuha\Lunaris\Ui;

    use Devyuha\Lunaris\Ui\Template;

    class View {
        private Template $engine;

        public function __construct(Template $engine) {
            $this->engine = $engine;
        }

        public function includes(string $path, array $args = [], string $module = "Main") {
            $this->engine->includes($path, $args, $module);
        }
    }
