<?php

    namespace Module\Components\Controllers;

    use Papyrus\Http\Controller;
    
    class ComponentsController extends Controller
    {
        public function index() {
            return view("index")
                    ->module("Components")
                    ->render();
        }
    }