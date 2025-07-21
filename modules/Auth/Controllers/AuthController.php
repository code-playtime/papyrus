<?php

    namespace Module\Auth\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Pdo;

    use Module\Auth\Queries\GetUserCount;
    
    class AuthController extends Controller
    {
        public function index() {
            echo "This is the Auth module.";
        }

        public function register() {
            try {
                $query = Pdo::execute(new GetUserCount());
                $count = $query->first()["count"];

                if($count > 0) {
                    return response()->redirect(route("auth.login"));
                }

                echo "This is the register page";
            } catch(Exception $e) {
                throw Exception($e->getMessage());
            }
        } 

        public function login() {
            echo "This is login page";
        }
    }
