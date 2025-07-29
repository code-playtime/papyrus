<?php

    use Devyuha\Lunaris\Http\Router;

    Router::get("/panel/articles", [Module\PanelArticles\Controllers\PanelArticlesController::class, 'index'])
        ->name("panel.articles");
