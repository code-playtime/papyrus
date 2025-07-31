<?php

    namespace Module\PanelArticles\Queries;

    use Devyuha\Lunaris\Facades\Query;

    class PaginateArticles extends Query {
        public function sql() {
            return <<<SQL
                SELECT
                    id, title, created_at
                FROM
                    articles
                ORDER BY id DESC
                LIMIT :limit
                OFFSET :offset
            SQL;
        }
    }
