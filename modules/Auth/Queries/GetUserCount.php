<?php

    namespace Module\Auth\Queries;

    use Devyuha\Lunaris\Facades\Query;

    class GetUserCount extends Query {
        public function sql() {
            return <<<SQL
                SELECT COUNT(id) as count FROM users 
            SQL;
        }
    }
