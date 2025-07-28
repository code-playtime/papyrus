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

Router::post("/login", [Module\Auth\Controllers\AuthController::class, "loginUser"])
    ->addMiddleware(Module\Auth\Middlewares\LoginMiddleware::class)
    ->name("auth.signin");

Router::get("/setup", [Module\Auth\Controllers\AuthController::class, "setup"])
    ->addMiddleware(Module\Auth\Middlewares\SetupMiddleware::class)
    ->name("auth.setup");
