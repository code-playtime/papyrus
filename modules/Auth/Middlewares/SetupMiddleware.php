<?php

    namespace Module\Auth\Middlewares;

    use Pecee\Http\Middleware\IMiddleware;
    use Pecee\Http\Request;

    use Devyuha\Lunaris\Facades\Session;
    use Devyuha\Lunaris\Facades\Pdo;

    class SetupMiddleware implements IMiddleware {
        public function handle(Request $request): void {
            if(!Session::has("auth")) {
                response()->redirect(route("auth.login"));
            }
        }
    }
