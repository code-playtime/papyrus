<?php

    namespace Module\Auth\Queries;

    use Papyrus\Facades\Query;

    class VerifyAnswers extends Query {
        public function sql() {
            return <<<SQL
                SELECT u.id, u.email, q.answer_1, q.answer_2, q.answer_3 FROM users as u INNER JOIN security_questions as q ON u.id = q.user_id WHERE u.email = :email;
            SQL;
        }
    }
