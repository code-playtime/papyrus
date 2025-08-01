<?php

    namespace Module\PanelArticles\Controllers;

    use Devyuha\Lunaris\Http\Controller;
    use Devyuha\Lunaris\Facades\Flash;
    use Devyuha\Lunaris\Http\Request;

    use Module\PanelArticles\Requests\CreateArticleRequest;
    use Module\PanelArticles\Services\ArticleService;
    
    class PanelArticlesController extends Controller
    {
        public function index() {
            $request = new Request();
            $service = new ArticleService();
            $response = $service->getArticleListing($request);

            if(!$response->getSuccess()) {
                Flash::make("error", $response->getMessage());
            }

            return view("listing", $response->getData())
                    ->module("PanelArticles")
                    ->render();
        }

        public function create() {
            return view("create", ["module" => "PanelArticles"]);
        }

        public function addArticle() {
            $request = new CreateArticleRequest();
            if(!$request->validated()) {
                $request->remember();
                Flash::make("error", $request->errors());
                $request->remember();
                return response()->redirect(route("panel.articles.create"));
            }

            $service = new ArticleService();
            $response = $service->addArticle($request);
            $responseStatus = $response->getSuccess() ? "success" : "error";

            Flash::make($responseStatus, $response->getMessage());
            return response()->redirect(route("panel.articles.create"));
        }
    }
