<?php

    use Devyuha\Lunaris\Http\Router;

    Router::get("/panel", [Module\Panel\Controllers\PanelController::class, 'index']);