<?php

namespace Module\Auth\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Papyrus\Database\Pdo;
use Module\Auth\Facades\Auth;

class SetupMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        if (!Auth::isActive()) {
            response()->redirect(route("auth.login"));
        }
    }
}
