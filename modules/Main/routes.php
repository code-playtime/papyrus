<?php

    use Papyrus\Http\Router;

    /* Router::group(["middleware" => Module\Auth\Middlewares\CheckUserMiddleware::class], function() { */
    /*     Router::get("/", [Module\Main\Controllers\MainController::class, "home"])->name("main.index");   */
    /* });  */

    Router::get("/", [Module\Main\Controllers\MainController::class, "home"])
            ->addMiddleware(Module\Auth\Middlewares\CheckUserMiddleware::class)
            ->name("main.index");
