<?php

    namespace Module\PanelArticles\Queries;

    use Papyrus\Facades\Query;

    class FindArticleById extends Query {
        public function sql() {
            return <<<SQL
                SELECT
                    id, created_at, title, content, banner, tags, metadata, slug, status
                FROM
                    articles
                WHERE
                    id = :id
            SQL;
        }
    }
