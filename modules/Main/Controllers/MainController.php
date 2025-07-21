<?php

    namespace Module\Main\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Pdo;
    use Module\Main\Queries\ListUsers;

    use Module\Auth\Queries\GetUserCount;

    use Exception;

    class MainController extends Controller {
        public function home() {
            echo "This is the main module";
        }
    }
