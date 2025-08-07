<?php

namespace Module\PanelArticles\Controllers;

use Papyrus\Http\Controller;
use Papyrus\Facades\Flash;
use Papyrus\Http\Request;
use Module\PanelArticles\Requests\CreateArticleRequest;
use Module\PanelArticles\Requests\UpdateArticleRequest;
use Module\PanelArticles\Services\ArticleService;

class PanelArticlesController extends Controller
{
    public function index()
    {
        $request = new Request();
        $service = new ArticleService();
        $response = $service->getArticleListing($request);

        if (!$response->getSuccess()) {
            Flash::make("error", $response->getMessage());
        }

        return view("listing", $response->getData())
                ->module("PanelArticles")
                ->render();
    }

    public function create()
    {
        return view("create")
                ->module("PanelArticles")
                ->render();
    }

    public function edit($id)
    {
        $service = new ArticleService();
        $result = $service->findArticleById($id);

        if (!$result->getSuccess()) {
            Flash::make("error", $result->getMessage());
            return response()->redirect(route("panel.articles"));
        }

        return view("edit", $result->getData())
                ->module("PanelArticles")
                ->render();
    }

    public function addArticle()
    {
        $request = new CreateArticleRequest();
        if (!$request->validated()) {
            $request->remember();
            Flash::make("error", $request->errors());
            return response()->redirect(route("panel.articles.create"));
        }

        $service = new ArticleService();
        $response = $service->addArticle($request);
        $responseStatus = $response->getSuccess() ? "success" : "error";

        Flash::make($responseStatus, $response->getMessage());
        return response()->redirect(route("panel.articles.create"));
    }

    public function updateArticle($id)
    {
        $request = new UpdateArticleRequest();
        if (!$request->validated()) {
            $request->remember();
            Flash::make("error", $request->errors());
            return response()->redirect(route("panel.articles.edit", ["id" => $id]));
        }

        $service = new ArticleService();
        $response = $service->updateArticle($request, $id);
        $status = $response->getSuccess() ? "success" : "error";
        Flash::make($status, $response->getMessage());
        return response()->redirect(route("panel.articles"));
    }
}
