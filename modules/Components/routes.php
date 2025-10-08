<?php

    use Papyrus\Http\Router;

    Router::get("/panel/components", [Module\Components\Controllers\ComponentsController::class, 'index'])
        ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
        ->name("panel.components");