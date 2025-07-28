<?php

use Devyuha\Lunaris\Http\Router;

Router::get("/register", [Module\Auth\Controllers\AuthController::class, 'register'])
    ->addMiddleware(Module\Auth\Middlewares\AuthNotActive::class)
    ->addMiddleware(Module\Auth\Middlewares\RegisterMiddleware::class)
    ->name("auth.register");

Router::post("/register", [Module\Auth\Controllers\AuthController::class, 'addUser'])
    ->addMiddleware(Module\Auth\Middlewares\RegisterMiddleware::class)
    ->name("auth.add-user");

Router::get("/login", [Module\Auth\Controllers\AuthController::class, "login"])
    ->addMiddleware(Module\Auth\Middlewares\AuthNotActive::class)
    ->addMiddleware(Module\Auth\Middlewares\LoginMiddleware::class)
    ->name("auth.login");

Router::post("/login", [Module\Auth\Controllers\AuthController::class, "loginUser"])
    ->addMiddleware(Module\Auth\Middlewares\LoginMiddleware::class)
    ->name("auth.signin");

Router::get("/setup", [Module\Auth\Controllers\AuthController::class, "setup"])
    ->addMiddleware(Module\Auth\Middlewares\SetupMiddleware::class)
    ->name("auth.setup");

Router::post("/setup", [Module\Auth\Controllers\AuthController::class, "addSetup"])
    ->name("auth.add-questions");

Router::get("/forgot", [Module\Auth\Controllers\ForgotController::class, "forgot"])
    ->addMiddleware(Module\Auth\Middlewares\AuthNotActive::class)
    ->name("auth.forgot");

Router::post("/forgot", [Module\Auth\Controllers\ForgotController::class, "forgotEmail"])
    ->name("auth.post-forgot");

Router::get("/verify", [Module\Auth\Controllers\ForgotController::class, "verify"])
    ->addMiddleware(Module\Auth\Middlewares\VerifyMiddleware::class)
    ->name("auth.verify");

Router::post("/verify", [Module\Auth\Controllers\ForgotController::class, "verifyAnswers"])
    ->name("auth.verify-answers");

Router::get("/reset-password", [Module\Auth\Controllers\ResetController::class, "reset"])
    ->addMiddleware(Module\Auth\Middlewares\ResetMiddleware::class)
    ->name("auth.reset");

Router::get("/logout", [Module\Auth\Controllers\AuthController::class, "logout"])
    ->name("auth.logout");
