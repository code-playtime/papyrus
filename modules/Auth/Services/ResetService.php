<?php

namespace Module\Auth\Services;

use Papyrus\Database\Pdo;
use Papyrus\Http\Password;
use Papyrus\Support\Facades\Session;
use Exception;
use Module\Main\ServiceResult;
use Module\Auth\Facades\Token;
use Module\Auth\Queries\UpdatePasswordByEmail;

class ResetService
{
    public function resetPassword($request)
    {
        $result = new ServiceResult();
        try {
            $tokenData = Token::fetch(Session::get("reset_token"));
            $password = Password::hash($request->input("password"));
            $query = Pdo::execute(new UpdatePasswordByEmail([
                ":email" => $tokenData["email"],
                ":password" => $password
            ]));

            Session::delete("reset_token");

            $result->setSuccess(true);
            $result->setMessage("Password has been updated.");
            $result->setData(["url" => route("auth.login")]);
        } catch (Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
            $result->setData(["url" => route("auth.reset")]);
        }

        return $result;
    }
}
