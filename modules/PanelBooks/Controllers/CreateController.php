<?php

namespace Module\PanelBooks\Controllers;

use Papyrus\Http\Controller;

class CreateController extends Controller
{
    public function index()
    {
        return view("create")->module("PanelBooks")->render();
    }
}

