<?php

    namespace Module\PanelBooks\Queries;

    use Papyrus\Database\Query;

    class GetBookCount extends Query {
        public function sql() {
            return <<<SQL
                SELECT COUNT(id) as count from books;
            SQL;
        }
    }