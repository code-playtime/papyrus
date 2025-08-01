<?php

namespace Module\Panel\Controllers;

use Papyrus\Http\Controller;
    
class PanelController extends Controller
{
    public function index() {
        return view("index")->module("Panel")->render();
    }
}
