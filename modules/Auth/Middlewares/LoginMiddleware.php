<?php

    namespace Module\Auth\Middlewares;

    use Pecee\Http\Middleware\IMiddleware;
    use Pecee\Http\Request;

    use Devyuha\Lunaris\Facades\Pdo;
    use Module\Auth\Queries\GetUserCount;

    class LoginMiddleware implements IMiddleware {
        public function handle(Request $request): void {
            $query = Pdo::execute(new GetUserCount());
            $count = $query->first()["count"];

            if($count <= 0) {
                response()->redirect(route("auth.register"));
            }
        }
    }
