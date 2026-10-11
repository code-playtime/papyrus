<?php

    namespace Module\PanelBooks\Queries;

    use Papyrus\Database\Query;

    class FindBookById extends Query {
        public function sql() {
            return <<<SQL
                SELECT
                    id, title, description, banner, tags, metadata, status, slug, created_at
                FROM
                    books
                WHERE
                    id = :id
            SQL;
        }
    }