<?php

namespace Module\Panel\Controllers;

use Devyuha\Lunaris\Http\Controller;
    
class PanelController extends Controller
{
    public function index() {
        return view("index", [
            "module" => "Panel"
        ]);
    }
}
