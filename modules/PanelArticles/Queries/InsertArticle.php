<?php

namespace Module\PanelArticles\Queries;

use Papyrus\Database\Query;

class InsertArticle extends Query
{
    public function sql()
    {
        return <<<SQL
                INSERT INTO articles
                    (title, content, slug, tags, banner, metadata)
                VALUES
                    (:title, :content, :slug, :tags, :banner, :metadata)
            SQL;
    }
}
