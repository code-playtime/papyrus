<?php

namespace Module\PanelBooks\Controllers;

use Papyrus\Http\Controller;

class PanelBooksController extends Controller
{
    public function index()
    {
        return view("listing")->module("PanelBooks")->render();
    }
}

