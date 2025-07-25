<?php

    namespace Module\Auth\Services;

    use Devyuha\Lunaris\Facades\Password;
    use Devyuha\Lunaris\Facades\Pdo;

    use Module\Auth\Queries\AddUserQuery;
    use Module\Main\ServiceResult;

    class RegisterService {
        public function addUser($request) {
            $result = new ServiceResult();

            try {
                $name = $request->input("name");
                $username = $request->input("username");
                $email = $request->input("email");
                $password = $request->input("password");
                $password = Password::hash($password);

                $query = Pdo::execute(new AddUserQuery([
                    ":name" => $name,
                    ":username" => $username,
                    ":email" => $email,
                    ":password" => $password,
                    ":role" => "admin"
                ]));

                $result->setSuccess(true);
                $result->setMessage("User has been created with id : " . $query->getId());
            } catch (Exception $e) {
                $result->setSuccess(false);
                $result->setMessage($e->getMessage());
            }

            return $result;
        }
    }
