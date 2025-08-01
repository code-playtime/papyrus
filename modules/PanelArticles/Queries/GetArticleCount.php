<?php

    namespace Module\PanelArticles\Queries;

    use Papyrus\Facades\Query;

    class GetArticleCount extends Query {
        public function sql() {
            return <<<SQL
                SELECT COUNT(id) as count FROM articles; 
            SQL;
        }
    }
