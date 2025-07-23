<?php

    use Devyuha\Lunaris\Http\Router;

    Router::get("/register", [Module\Auth\Controllers\AuthController::class, 'register'])
            ->addMiddleware(Module\Auth\Middlewares\RegisterMiddleware::class)
            ->name("auth.register");

    Router::post("/register", [Module\Auth\Controllers\AuthController::class, 'addUser'])
            ->addMiddleware(Module\Auth\Middlewares\RegisterMiddleware::class)
            ->name("auth.add-user");

    Router::get("/login", [Module\Auth\Controllers\AuthController::class, "login"])
            ->addMiddleware(Module\Auth\Middlewares\LoginMiddleware::class)
            ->name("auth.login");




