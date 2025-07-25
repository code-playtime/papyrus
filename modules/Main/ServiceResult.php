<?php

    namespace Module\Main;

    class ServiceResult {
        private $message;
        private $success;
        private $errors;

        public function __construct($success = false, $message = "", $errors = []) {
            $this->success = $success;
            $this->message = $message;
            $this->errors = $errors;
        }
        
        public function setSuccess($success) {
            $this->success = $success;
        }

        public function getSuccess() {
            return $this->success;
        }

        public function setMessage($message) {
            return $this->message = $message;
        }   

        public function getMessage() {
            return $this->message ?? "";
        }

        public function setErrors($errors) {
            $this->errors = $errors;
        }

        public function getErrors() {
            return $this->errors;
        }
    }
