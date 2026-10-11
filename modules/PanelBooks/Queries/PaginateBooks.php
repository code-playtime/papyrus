<?php

    namespace Module\PanelBooks\Queries;

    use Papyrus\Database\Query;

    class PaginateBooks extends Query {
        public function sql() {
            return <<<SQL
                SELECT
                    id, title, status, created_at
                FROM
                    books 
                ORDER BY id DESC 
                LIMIT :limit 
                OFFSET :offset
            SQL;
        }
    }
