<?php

    namespace Module\Auth\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Pdo;
    use Devyuha\Lunaris\Facades\Flash;

    use Module\Auth\Queries\GetUserCount;
    use Module\Auth\Requests\RegisterRequest;
    
    class AuthController extends Controller
    {
        public function index() {
            echo "This is the Auth module.";
        }

        public function register() { 
            return view("register", ["module" => "Auth"]);
        } 

        public function login() {
            echo "This is login page";
        }

        public function addUser() {
            $request = new RegisterRequest();
            if(!$request->validated()) {
                Flash::make("error", $request->errors());
                return response()->redirect(route("auth.register"));
            }
            
            Flash::make("success", ["Form submitted successfully"]);
            return response()->redirect(route("auth.register"));
        }
    }
