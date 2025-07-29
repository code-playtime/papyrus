<?php

    namespace Devyuha\Lunaris\Http;

    class PublicUploader {
        private $file;
        private $name;
        private $path;
        private $url;

        public function __construct($file, $name = "", $path = "") {
            $this->file = $file;
            $this->name = $name;
            $this->path = $path;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getName() {
            return $this->name;
        }

        public function setPath($path) {
            $this->path = $path;
        }

        public function getPath() {
            return $this->path;
        }

        private function setUrl($url) {
            $this->url = $url;
        }

        public function getUrl() {
            return $this->url;
        }

        public function getOriginalName() {
            return $this->file["name"] ?? "";
        }

        public function getExtension() {
            return pathinfo($this->file["name"], PATHINFO_EXTENSION);
        }

        public function getSize() {
            return $this->file["size"] ?? 0;
        }

        public function getType() {
            return $this->file["type"] ?? "";
        }

        public function upload() {
            $newFileName = $this->name . "." . $this->getExtension();
            $this->isDir();
            $uploadDir = storage_path($this->path);
            $tmpPath = $this->file["tmp_name"];

            if(move_uploaded_file($tmpPath, $uploadDir . "/" . $newFileName)) {
                $this->setUrl(storage_asset($this->path . "/" . $newFileName));
                return true;
            }

            return false;
        }

        private function isDir() {
            $path = storage_path($this->path);
            if(!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            return true;
        }
    }
