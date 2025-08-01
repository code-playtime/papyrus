<?php
    
namespace Module\Auth\Services;

use Papyrus\Facades\Pdo;
use Papyrus\Facades\Password;

use Module\Main\ServiceResult;
use Module\Auth\Queries\GetUserByEmail;
use Module\Auth\Queries\CheckQuestionsCount;
use Module\Auth\Facades\Auth;

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

            Auth::create($user["id"]);

            $isQuestions = $this->checkQuestions($user["id"]);
            $redirectUrl = $isQuestions ? route("panel.dashboard") : route("auth.setup");

            $result->setSuccess(true);
            $result->setMessage("Successfully logged in");
            $result->setData(["url" => $redirectUrl]);
        } catch(Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }

    private function checkQuestions($user_id) {
        $query = Pdo::execute(new CheckQuestionsCount([
            ":user_id" => $user_id
        ]));

        $count = $query->first()["count"];

        if($count > 0) {
            return true;
        }

        return false;
    }
}
