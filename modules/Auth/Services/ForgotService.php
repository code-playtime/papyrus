<?php

    namespace Module\Auth\Services;

    use Devyuha\Lunaris\Facades\Pdo;
    use Devyuha\Lunaris\Facades\Session;

    use Exception;
    
    use Module\Main\ServiceResult;
    use Module\Auth\Queries\GetUserByEmail;
    use Module\Auth\Queries\GetVerifyData;

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
    }
