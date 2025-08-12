<?php

use Papyrus\Http\Router;
use Module\Panel\Middlewares\CheckAuthMiddleware;
use Module\PanelBooks\Controllers\PanelBooksController;
use Module\PanelBooks\Controllers\CreateController;

Router::get("/panel/books", [PanelBooksController::class, 'index'])
    ->addMiddleware(CheckAuthMiddleware::class)
    ->name("panel.books");

Router::get("/panel/books/create", [CreateController::class, "index"])
    ->addMiddleware(CheckAuthMiddleware::class)
    ->name("panel.books.create");
