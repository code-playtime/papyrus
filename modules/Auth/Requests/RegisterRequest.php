<?php

    namespace Module\Auth\Requests;

    use Devyuha\Lunaris\Http\Request;

    use Module\Main\Traits\Validateable;
    
    class RegisterRequest extends Request
    {
        use Validateable;

        protected function handle() {
            //
        }

        protected function validate() {
            $this->field("name", $this->input("name"))
                ->required("Name is required");

            $this->field("username", $this->input("username"))
                ->required("Username is required");

            $this->field("email", $this->input("email"))
                ->required("Email is required")
                ->email("Invalid email format");

            $this->field("password", $this->input("password"))
                ->required("Password s required")
                ->equals($this->input("confirm_password"), "Password is not same as confirm password");
        }
    }
