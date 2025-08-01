<?php

    namespace Module\Auth\Middlewares;

    use Pecee\Http\Middleware\IMiddleware;
    use Pecee\Http\Request;

    use Papyrus\Facades\Pdo;
    use Module\Auth\Queries\GetUserCount;

    class CheckUserMiddleware implements IMiddleware {
        public function handle(Request $request): void {
            $query = Pdo::execute(new GetUserCount());
            $count = $query->first()["count"];

            if($count <= 0) {
                response()->redirect(route("auth.register"));
            } else {
                response()->redirect(route("auth.login"));
            }
        }
    }
