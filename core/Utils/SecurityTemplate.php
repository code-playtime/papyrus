<?php

    namespace Papyrus\Utils;

    class SecurityTemplate {
        public static function getArgs(array $args) {
            $parsed = [];
            if(count($args) > 0) {
                foreach($args as $arg) {
                    if(strpos($arg, '=') !== false) {
                        [$key, $value] = explode('=', $arg, 2);
                        $parsed[$key] = $value;
                    }
                }
            }
            return $parsed;
        }

        public static function request($moduleName, $requestName=null) {
            if(!$requestName) {
                $requestName = $moduleName . 'Request';
            }

            $content = <<<PHP
            <?php

                namespace Module\\{$moduleName}\\Requests;

                use Papyrus\\Http\\Request;
                
                class {$requestName} extends Request
                {
                    protected function secure() {
                        return [
                            // Inputs to be secured and should not be remembered.
                        ];
                    }

                    protected function handle() {
                        // add/modify request data
                    }

                    protected function validate() {
                        // validate your request data
                    }
                }
            PHP;

            return $content;
        }
    }
