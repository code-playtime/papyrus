<?php

namespace Module\PanelArticles\Queries;

use Papyrus\Database\Query;

class GetArticleCount extends Query
{
    public function sql()
    {
        return <<<SQL
                SELECT COUNT(id) as count FROM articles; 
            SQL;
    }
}
