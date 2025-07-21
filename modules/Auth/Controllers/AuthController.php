<?php

    namespace Module\Auth\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    
    class AuthController extends Controller
    {
        public function index() {
            echo "This is the Auth module.";
        }

        public function register() {
            echo "This is register page";
        }

        public function login() {
            echo "This is login page";
        }
    }
