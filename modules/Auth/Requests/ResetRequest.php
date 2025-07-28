<?php

    namespace Module\Auth\Requests;

    use Devyuha\Lunaris\Http\Request;
    use Module\Main\Traits\Validateable;
    
    class ResetRequest extends Request
    {
        use Validateable;

        protected function handle() {
            // add/modify request data
        }

        protected function validate() {
            $this->field("password", $this->input("password"))
                ->required("Password is required");

            $this->field("confirm_password", $this->input("confirm_password"))
                ->required("Confirm password is required")
                ->equals($this->input("password"), "Password and confirm password are not same.");
        }
    }
