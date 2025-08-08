<?php

use Papyrus\Http\Router;

Router::get("/panel/articles", [Module\PanelArticles\Controllers\PanelArticlesController::class, 'index'])
    ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
    ->name("panel.articles");

Router::get("/panel/articles/create", [Module\PanelArticles\Controllers\PanelArticlesController::class, "create"])
    ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
    ->name("panel.articles.create");

Router::get("/panel/articles/{id}/edit", [Module\PanelArticles\Controllers\PanelArticlesController::class, "edit"])
    ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
    ->name("panel.articles.edit");

Router::post("/panel/articles/create", [Module\PanelArticles\Controllers\PanelArticlesController::class, "addArticle"])
    ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
    ->name("panel.articles.add");

Router::post("/panel/articles/{id}/edit", [Module\PanelArticles\Controllers\PanelArticlesController::class, "updateArticle"])
    ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
    ->name("panel.articles.update");
