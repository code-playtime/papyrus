<?php

use Papyrus\Http\Router;
use Module\Panel\Middlewares\CheckAuthMiddleware;

Router::get("/panel/books", [Module\PanelBooks\Controllers\PanelBooksController::class, 'index'])
    ->addMiddleware(CheckAuthMiddleware::class)
    ->name("panel.books");

