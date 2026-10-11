<?php

    namespace Papyrus\Interface;

    interface MailInterface {
        public function handle(array $args): void;
    }
