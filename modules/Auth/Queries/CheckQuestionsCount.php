<?php

    namespace Module\Auth\Queries;

    use Devyuha\Lunaris\Facades\Query;

    class CheckQuestionsCount extends Query {
        public function sql() {
            return <<<SQL
                SELECT COUNT(id) as count FROM security_questions WHERE user_id = :user_id;
            SQL;
        }
    }
