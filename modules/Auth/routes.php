<?php

    use Devyuha\Lunaris\Http\Router;

    Router::get("/register", [Module\Auth\Controllers\AuthController::class, 'register'])->name("auth.register");
    Router::get("/login", [Module\Auth\Controllers\AuthController::class, "login"])->name("auth.login");




