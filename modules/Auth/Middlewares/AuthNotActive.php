<?php

    namespace Module\Auth\Middlewares;

    use Pecee\Http\Middleware\IMiddleware;
    use Pecee\Http\Request;

    use Module\Auth\Facades\Auth;

    class AuthNotActive implements IMiddleware {
        public function handle(Request $request): void {
            if(Auth::isActive()) {
                response()->redirect(route("panel.dashboard"));
            }
        }
    }
