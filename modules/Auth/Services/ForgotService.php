<?php

    namespace Module\Auth\Services;

    use Papyrus\Facades\Pdo;
    use Papyrus\Facades\Session;
    use Papyrus\Facades\Password;

    use Exception;
    
    use Module\Main\ServiceResult;
    use Module\Auth\Queries\GetUserByEmail;
    use Module\Auth\Queries\GetVerifyData;
    use Module\Auth\Queries\VerifyAnswers;
    use Module\Auth\Facades\Token;

    class ForgotService {
        public function forgotEmail($request) {
            $result = new ServiceResult();
            try {
                $query = Pdo::execute(new GetUserByEmail([
                    ":email" => $request->input("email")
                ]));
            if($query->count() <= 0) {
                    throw new Exception("No account found with the given email.");
                }

                Session::put("account_email", $request->input("email"));

                $result->setSuccess(true);
                $result->setMessage("Verify your account to reset password.");
            } catch (Exception $e) {
                $result->setSuccess(false);
                $result->setMessage($e->getMessage());
            }

            return $result;
        }

        public function getVerifyData() {
            $result = new ServiceResult();
            try {
                $email = Session::get("account_email");
                $query = Pdo::execute(new GetVerifyData([":email" => $email]));
                $data = $query->first();

                $result->setSuccess(true);
                $result->setData($data);
            } catch (Exception $e) {
                $result->setSuccess(false);
                $result->setMessage($e->getMessage());
            }
            return $result;
        }

        public function verifyAnswers($request) {
            $result = new ServiceResult();
            try {
                $email = Session::get("account_email");
                $query = Pdo::execute(new VerifyAnswers([":email" => $email]));
                $data = $query->first();

                if(!Password::verify($request->input("answer_1"), $data["answer_1"])) {
                    throw new Exception("Answer 1 is wrong");
                }

                if(!Password::verify($request->input("answer_2"), $data["answer_2"])) {
                    throw new Exception("Answer 2 is wrong");
                }

                if(!Password::verify($request->input("answer_3"), $data["answer_3"])) {
                    throw new Exception("Answer 3 is wrong");
                }

                $token = Token::generate([
                    "email" => $email,
                    "verified" => true
                ]);
                Session::delete("account_email");
                Session::put("reset_token", $token);

                $result->setSuccess(true);
                $result->setData(["url" => route("auth.reset")]);
                $result->setMessage("Your account has been verified, you can now reset your password.");
            } catch (Exception $e) {
                $result->setSuccess(false);
                $result->setData(["url" => route("auth.verify")]);
                $result->setMessage($e->getMessage());
            }

            return $result;
        }
    }
