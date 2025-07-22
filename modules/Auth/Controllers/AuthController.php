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
            return view("register", ["module" => "Auth"]);
        } 

        public function login() {
            echo "This is login page";
        }
    }
