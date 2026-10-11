<?php

namespace Module\PanelArticles\Queries;

use Papyrus\Database\Query;
use Papyrus\Database\Traits\HasDynamicUpdate;

class UpdateArticleById extends Query
{
    use HasDynamicUpdate;

    public function init()
    {
        $this->start("articles");
    }

    public function sql()
    {
        return $this->getQuery();
    }
}
