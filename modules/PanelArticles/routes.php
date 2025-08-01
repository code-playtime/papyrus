<?php

    use Papyrus\Http\Router;

    Router::get("/panel/articles", [Module\PanelArticles\Controllers\PanelArticlesController::class, 'index'])
        ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
        ->name("panel.articles");

    Router::get("/panel/articles/create", [Module\PanelArticles\Controllers\PanelArticlesController::class, "create"])
        ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
        ->name("panel.articles.create");

    Router::post("/panel/articles/create", [Module\PanelArticles\Controllers\PanelArticlesController::class, "addArticle"])
        ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
        ->name("panel.articles.add");
