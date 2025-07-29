<?php

    namespace Module\PanelArticles\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    
    class PanelArticlesController extends Controller
    {
        public function index() {
            return view("listing", ["module" => "PanelArticles"]);
        }

        public function create() {
            return view("create", ["module" => "PanelArticles"]);
        }
    }
