<?php

    namespace Module\Panel\Middlewares;

    use Pecee\Http\Middleware\IMiddleware;
    use Pecee\Http\Request;

    use Devyuha\Lunaris\Facades\Session;

    class CheckAuthMiddleware implements IMiddleware {
        public function handle(Request $request): void {
            if(!Session::has("auth")) {
                response()->redirect(route("auth.login"));
            }
        }
    }
