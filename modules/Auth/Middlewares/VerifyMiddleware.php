<?php

    namespace Module\Auth\Middlewares;

    use Pecee\Http\Middleware\IMiddleware;
    use Pecee\Http\Request;

    use Devyuha\Lunaris\Facades\Session;

    class VerifyMiddleware implements IMiddleware {
        public function handle(Request $request): void {
            if(!Session::has("account_email")) {
                response()->redirect(route("auth.forgot"));
            }
        }
    }
