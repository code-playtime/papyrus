<?php

    namespace Module\Auth\Requests;

    use Devyuha\Lunaris\Http\Request;
    
    class RegisterRequest extends Request
    {
        protected function handle() {
            //
        }

        protected function validate() {
            $name = $this->input("name");
            $username = $this->input("username");
            $email = $this->input("email");
            $password = $this->input("password");
            $confirm_password = $this->input("confirm_password");

            if(!isset($name) || empty($name)) {
                $this->error("name", "Name is required.");
            }

            if(!isset($username) || empty($username)) {
                $this->error("username", "Username is required.");
            }

            if(!isset($email) || empty($email)) {
                $this->error("email", "Email is required.");
            }

            if(!isset($password) || empty($password)) {
                $this->error("password", "Password is required.");
            }

            if($password !== $confirm_password) {
                $this->error("password", "Password is not same as confirm password.");
            }
        }
    }
