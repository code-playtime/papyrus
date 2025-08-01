<?php

    namespace Module\Auth\Requests;

    use Devyuha\Lunaris\Http\Request;

    use Module\Main\Traits\Validateable;
    
    class ForgotRequest extends Request
    {
        use Validateable;

        protected function secure() {
            return [
                //
            ];
        }

        protected function handle() {
            // add/modify request data
        }

        protected function validate() {
            $this->field("email", $this->input("email"))
                ->required("Email is required")
                ->email("Invalid Email");
        }
    }
