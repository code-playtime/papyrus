<?php

    namespace Papyrus\Facades;

    use Papyrus\Http\PublicUploader;

    class Storage
    {
        public static function url($path) {
            return storage_asset($path);
        }

        public static function path($path) {
            return storage_path($path);
        }

        public static function has($path) {
            return storage_exists($path);
        }

        public static function delete($path) {
            return storage_unlink($path);
        }

        public static function open($file, $name = "", $path = "") {
            return new PublicUploader($file, $name, $path);
        }
    }
