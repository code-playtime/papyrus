<?php

    namespace Module\Auth\Queries;

    use Devyuha\Lunaris\Facades\Query;

    class GetVerifyData extends Query {
        public function sql() {
            return <<<SQL
                SELECT 
                    u.id, u.email, q.question_1, q.question_2, q.question_3
                FROM
                    users as u
                INNER JOIN
                    security_questions as q
                ON
                    u.id = q.user_id
                WHERE u.email = :email; 
            SQL;
        }
    }
