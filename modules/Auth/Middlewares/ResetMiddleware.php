<?php

    namespace Module\Auth\Middlewares;

    use Pecee\Http\Middleware\IMiddleware;
    use Pecee\Http\Request;

    use Papyrus\Facades\Session;

    class ResetMiddleware implements IMiddleware {
        public function handle(Request $request): void {
            if(!Session::has("reset_token")) {
                response()->redirect(route("auth.verify"));
            }
        }
    }
