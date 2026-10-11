<?php

namespace Module\Auth\Queries;

use Papyrus\Database\Query;

class AddQuestions extends Query
{
    public function sql()
    {
        return <<<SQL
                INSERT INTO security_questions
                    (user_id, question_1, answer_1, question_2, answer_2, question_3, answer_3)
                VALUES
                    (:user_id, :question_1, :answer_1, :question_2, :answer_2, :question_3, :answer_3);
            SQL;
    }
}
