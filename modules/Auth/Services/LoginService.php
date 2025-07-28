<?php
    
namespace Module\Auth\Services;

use Devyuha\Lunaris\Facades\Pdo;
use Devyuha\Lunaris\Facades\Password;
use Devyuha\Lunaris\Facades\Session;

use Module\Main\ServiceResult;
use Module\Auth\Queries\GetUserByEmail;
use Exception;

class LoginService {
    public function loginUser($request) {
        $result = new ServiceResult();

        try {
            $email = $request->input("email");
            $password = $request->input("password");

            $userQuery = Pdo::execute(new GetUserByEmail([
                ":email" => $email
            ]));

            if($userQuery->count() <= 0) {
                throw new Exception("User not found with this email");
            }

            $user = $userQuery->first();

            if(!Password::verify($password, $user["password"])) {
                throw new Exception("Invalid password");
            }
            Session::put("auth", $user["id"]);
            $result->setSuccess(true);
            $result->setMessage("Successfully logged in");
        } catch(Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }
}
