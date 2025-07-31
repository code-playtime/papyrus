<?php

    namespace Module\PanelArticles\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Flash;

    use Module\PanelArticles\Requests\CreateArticleRequest;
    
    class PanelArticlesController extends Controller
    {
        public function index() {
            return view("listing", ["module" => "PanelArticles"]);
        }

        public function create() {
            return view("create", ["module" => "PanelArticles"]);
        }

        public function addArticle() {
            $request = new CreateArticleRequest();
            if(!$request->validated()) {
                $request->remember();
                Flash::make("error", $request->errors());
                return response()->redirect(route("panel.articles.create"));
            }

            Flash::make("success", "Form success");
            return response()->redirect(route("panel.articles.create"));
        }
    }
