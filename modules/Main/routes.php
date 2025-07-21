<?php

    use Devyuha\Lunaris\Http\Router;

    Router::group(["middleware" => Module\Auth\Middlewares\CheckUserMiddleware::class], function() {
        Router::get("/", [Module\Main\Controllers\MainController::class, "home"])->name("main.index");  
    }); 
