<?php

    use Devyuha\Lunaris\Http\Router;

    Router::get("/panel/articles", [Module\PanelArticles\Controllers\PanelArticlesController::class, 'index'])
        ->name("panel.articles");

    Router::get("/panel/articles/create", [Module\PanelArticles\Controllers\PanelArticlesController::class, "create"])
        ->name("panel.articles.create");
