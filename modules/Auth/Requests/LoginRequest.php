<?php

namespace Module\Auth\Requests;

use Devyuha\Lunaris\Http\Request;

use Module\Main\Traits\Validateable;

class LoginRequest extends Request
{
    use Validateable;

    protected function secure() {
        return [
            "password"
        ];
    }

    protected function handle()
    {
        // add/modify request data
    }

    protected function validate()
    {
        $this->field("email", $this->input("email"))
            ->required("Email is required")
            ->email("Invalid email");

        $this->field("password", $this->input("password"))
            ->required("Password is required");
    }
}

