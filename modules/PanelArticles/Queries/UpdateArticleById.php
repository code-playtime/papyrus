<?php

namespace Module\PanelArticles\Queries;

use Papyrus\Facades\Query;
use Papyrus\Traits\HasDynamicUpdate;

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
