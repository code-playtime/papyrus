<?php

    use Papyrus\Http\Router;

    Router::get("/panel", [Module\Panel\Controllers\PanelController::class, 'index'])
            ->addMiddleware(Module\Panel\Middlewares\CheckAuthMiddleware::class)
            ->name("panel.dashboard");
