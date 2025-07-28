<?php

    namespace Module\Auth\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    
    class ResetController extends Controller
    {
        public function reset() {
            return view("reset", ["module" => "Auth"]);
        }
    }
