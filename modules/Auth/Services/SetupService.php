<?php

    namespace Module\Auth\Services;

    use Exception;
    use Devyuha\Lunaris\Facades\Session;
    use Devyuha\Luanaris\Facades\Pdo;
    use Devyuha\Lunaris\Facades\Password;

    use Module\Main\ServiceResult;
    use Module\Auth\Queries\AddQuestions;

    class SetupService {
        public function addQuestions($request) {
            $result = new ServiceResult();

            try {
                $user_id = Session::get("auth");
                $insertQuery = Pdo::execute(new AddQuestions([
                    ":user_id" => $user_id,
                    ":question_1" => $this->input("question_1"),
                    ":answer_1" => Password::hash($this->input("answer_1")),
                    ":question_2" => $this->input("question_2"),
                    ":answer_2" => Password::hash($this->input("answer_2")),
                    ":question_3" => $this->input("question_3"),
                    ":answer_3" => Password::hash($this->input("answer_3"))
                ]));

                $result->setSuccess(true);
                $result->setMessage("Setup finished successfully!");
                $result->setData(["url" => route("auth.dashboard")]);
            } catch (Exception $e) {
                $result->setSuccess(false);
                $result->setMessage($e->getMessage());
                $result->setData(["url" => route("auth.setup")]);
            }

            return $result;
        }
    }
