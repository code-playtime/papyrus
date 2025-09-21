<?php

namespace Module\PanelBooks\Controllers;

use Module\PanelBooks\Services\BookService;
use Papyrus\Http\Controller;
use Papyrus\Support\Facades\Flash;
use Papyrus\Http\Request;

class PanelBooksController extends Controller
{
    public function index()
    {
        $request = new Request();
        $service = new BookService();
        $response = $service->getBookListing($request);

        if (!$response->getSuccess()) {
            Flash::make("error", $response->getMessage());
        }

        return view("listing", $response->getData())->module("PanelBooks")->render();
    }
}

