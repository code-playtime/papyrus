<?php

    namespace Module\PanelBooks\Controllers;

    use Papyrus\Http\Controller;
    use Papyrus\Support\Facades\Flash;
    use Module\PanelBooks\Services\BookService;
    
    class EditController extends Controller
    {
        public function index($id) {
            $service = new BookService();
            $result = $service->findBookById($id);

            if (!$result->getSuccess()) {
                Flash::make("error", $result->getMessage());
                return response()->redirect(route("panel.books"));
            }

            return view("edit", $result->getData())->module("PanelBooks")->render();
        }
    }