<?php

namespace Module\PanelArticles\Queries;

use Papyrus\Database\Query;

class PaginateArticles extends Query
{
    public function sql()
    {
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
