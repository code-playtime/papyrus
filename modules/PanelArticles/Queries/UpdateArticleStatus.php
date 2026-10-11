<?php

namespace Module\PanelArticles\Queries;

use Papyrus\Database\Query;

class UpdateArticleStatus extends Query
{
    public function sql()
    {
        return <<<SQL
                UPDATE articles SET status = :status WHERE id = :id;
            SQL;
    }
}

