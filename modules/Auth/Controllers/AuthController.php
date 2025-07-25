<?php

    namespace Module\Auth\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Pdo;
    use Devyuha\Lunaris\Facades\Flash;

    use Module\Auth\Queries\GetUserCount;
    use Module\Auth\Requests\RegisterRequest;
    use Module\Auth\Services\RegisterService;
    
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
            
            $service = new RegisterService();
            $response = $service->addUser($request);
            $responseStatus = $response->getSuccess() ? "success" : "error";
            Flash::make($responseStatus, $response->getMessage());

            return response()->redirect(route("auth.register"));
        }
    }
