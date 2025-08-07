<?php

    namespace Module\Auth\Services;

    use Exception;

    use Papyrus\Facades\Pdo;
    use Papyrus\Facades\Password;

    use Module\Main\ServiceResult;
    use Module\Auth\Queries\AddQuestions;
    use Module\Auth\Facades\Auth;

    class SetupService {
        public function addQuestions($request) {
            $result = new ServiceResult();

            try {
                $user_id = Auth::getUserId();
                $insertQuery = Pdo::execute(new AddQuestions([
                    ":user_id" => $user_id,
                    ":question_1" => $request->input("question_1"),
                    ":answer_1" => Password::hash($request->input("answer_1")),
                    ":question_2" => $request->input("question_2"),
                    ":answer_2" => Password::hash($request->input("answer_2")),
                    ":question_3" => $request->input("question_3"),
                    ":answer_3" => Password::hash($request->input("answer_3"))
                ]));

                $result->setSuccess(true);
                $result->setMessage("Setup finished successfully!");
                $result->setData(["url" => route("panel.dashboard")]);
            } catch (Exception $e) {
                $result->setSuccess(false);
                $result->setMessage($e->getMessage());
                $result->setData(["url" => route("auth.setup")]);
            }

            return $result;
        }
    }
