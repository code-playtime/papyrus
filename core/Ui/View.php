<?php

    namespace Papyrus\Ui;

    use Papyrus\Ui\Template;

    class View {
        private Template $engine;

        public function __construct(Template $engine) {
            $this->engine = $engine;
        }

        public function includes(string $path, array|null $args = null, string $module = null) {
            $this->engine->includes($path, $args, $module);
        }
    }
