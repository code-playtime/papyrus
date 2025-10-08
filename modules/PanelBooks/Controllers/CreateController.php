<?php

namespace Module\PanelBooks\Controllers;

use Papyrus\Http\Controller;
use Papyrus\Support\Facades\Flash;
use Module\PanelBooks\Requests\CreateBookRequest;
use Module\PanelBooks\Services\BookService;

class CreateController extends Controller
{
    public function index()
    {
        return view("create")->module("PanelBooks")->render();
    }

    public function addBook() {
        $request = new CreateBookRequest();
        if(!$request->validated()) {
            $request->remember();
            Flash::make("error", $request->errors());
            return response()->redirect(route("panel.books.create"));
        }

        $service = new BookService();
        $result = $service->addBook($request);
        $responseStatus = $result->getSuccess() ? "success" : "error";
        Flash::make($responseStatus, $result->getMessage());

        return response()->redirect(route("panel.books"));
    }
}

