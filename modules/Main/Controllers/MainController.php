<?php

    namespace Module\Main\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Pdo;
    use Module\Main\Queries\ListUsers;

    use Module\Auth\Queries\GetUserCount;

    use Exception;

    class MainController extends Controller {
        public function home() {
            try {
                $query = Pdo::execute(new GetUserCount());
                $count = $query->first()["count"];
                
                if($count <= 0) {
                    return response()->redirect(route("auth.register"));
                }

                return response()->redirect(route("auth.login"));
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
