<?php

namespace Module\PanelArticles\Services;

use Papyrus\Database\Pdo;
use Papyrus\Support\Storage;
use Exception;
use Module\Main\ServiceResult;
use Module\PanelArticles\Queries\InsertArticle;
use Module\PanelArticles\Queries\PaginateArticles;
use Module\PanelArticles\Queries\GetArticleCount;
use Module\PanelArticles\Queries\FindArticleById;
use Module\PanelArticles\Queries\UpdateArticleById;
use Module\PanelArticles\Queries\UpdateArticleStatus;

class ArticleService
{
    public function addArticle($request)
    {
        $result = new ServiceResult();

        try {
            $query = Pdo::execute(new InsertArticle([
                ":title" => $request->sanitizeInput("title"),
                ":content" => $request->input("content"),
                ":banner" => $this->uploadBannerImage($request->file("banner")),
                ":tags" => $request->sanitizeInput("tags"),
                ":slug" => $request->sanitizeInput("slug"),
                ":metadata" => json_encode([
                    "title" => $request->sanitizeInput("meta_title") ?? "",
                    "description" => $request->sanitizeInput("meta_description") ?? "",
                    "tags" => $request->sanitizeInput("meta_tags") ?? ""
                ])
            ]));

            $result->setSuccess(true);
            $result->setMessage("Article has been saved successfully.");
            $result->setData(["id" => $query->getId()]);
        } catch (Exception $e) {
            $request->remember();
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }

    public function updateArticle($request, $id)
    {
        $result = new ServiceResult();

        try {
            $queryClass = $this->makeUpdateQuery($request, $id);
            $query = Pdo::execute($queryClass);

            $result->setSuccess(true);
            $result->setMessage("Updated article successfully, rows effected : " . $query->getAffectedRows());
        } catch (Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }

    private function makeUpdateQuery($request, $id)
    {
        $query = new UpdateArticleById();
        $query->init();
        $data = [];
        $data[":id"] = $id;
        $metadata = [
            "title" => $request->sanitizeInput("meta_title") ?? "",
            "tags" => $request->sanitizeInput("meta_tags") ?? "",
            "description" => $request->sanitizeInput("meta_description") ?? ""
        ];

        if ($request->hasInput("title")) {
            $query->update("title", ":title");
            $data[":title"] = $request->sanitizeInput("title");
        }

        if ($request->hasInput("content")) {
            $query->update("content", ":content");
            $data[":content"] = $request->input("content");
        }

        if ($request->hasInput("slug")) {
            $query->update("slug", ":slug");
            $data[":slug"] = $request->sanitizeInput("slug");
        }

        if ($request->hasInput("tags")) {
            $query->update("tags", ":tags");
            $data[":tags"] = $request->sanitizeInput("tags");
        }

        if ($request->hasFile("banner")) {
            $banner = $this->uploadBannerImage($request->file("banner"));
            $query->update("banner", ":banner");
            $data[":banner"] = $banner;
        }
        $query->update("metadata", ":metadata");
        $data[":metadata"] = json_encode($metadata);
        $query->where("WHERE id = :id");
        $query->setArgs($data);

        return $query;
    }

    private function uploadBannerImage($file)
    {
        $name = date("Ymdhsi");
        $storage = Storage::open($file, $name, "banners");
        if ($storage->upload()) {
            return $storage->getName();
        }

        return null;
    }

    public function getArticleListing($request)
    {
        $result = new ServiceResult();

        try {
            $totalRows = (int) $this->getArticleCount();
            $limit = 10;
            $currentPage = (int) $request->param("page") ?? 1;
            $currentPage = max(1, $currentPage);
            $totalPages = ceil($totalRows / $limit);
            $offset = ($currentPage - 1) * $limit;
            $query = Pdo::execute(new PaginateArticles([
                ":limit" => (int) $limit,
                ":offset" => (int) $offset
            ]));

            $result->setSuccess(true);
            $result->setData([
                "articles" => $query
            ]);
        } catch (Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }

    private function getArticleCount()
    {
        $query = Pdo::execute(new GetArticleCount());
        $count = $query->first()["count"] ?? 0;

        return (int) $count;
    }

    private function getBannerUrl($banner)
    {
        $path = "banners/" . $banner;
        $storage_path = Storage::has($path) ? Storage::url($path) : null;
        return $storage_path;
    }

    public function findArticleById($id)
    {
        $result = new ServiceResult();

        try {
            $query = Pdo::execute(new FindArticleById([":id" => $id]));
            if ($query->count() > 0) {
                $article = $query->first();
                $metadata = $this->getMetaData($article["metadata"]);
                $result->setSuccess(true);
                $result->setData([
                    "article" => $article,
                    "banner_url" => $this->getBannerUrl($article["banner"]),
                    "meta_title" => $metadata["title"] ?? "",
                    "meta_tags" => $metadata["tags"] ?? "",
                    "meta_description" => $metadata["description"] ?? ""
                ]);
            } else {
                throw new Exception("Article not found.");
            }
        } catch (Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }

    private function getMetaData($data)
    {
        $data = json_decode($data, true);

        return $data;
    }

    public function updateArticleStatus($request, $id)
    {
        $result = new ServiceResult();

        try {
            $initialStatus = $request->sanitizeInput("status", "draft");
            $status = $initialStatus === "published" ? "draft" : "published";
            unset($initialStatus);
            $query = Pdo::execute(new updateArticleStatus([
                ":status" => $status,
                ":id" => $id
            ]));
            if (!$query->getAffectedRows()) {
                throw new Exception("Error in updating status");
            }
            $result->setSuccess(true);
            $result->setMessage("Article status has been updated successfully");
        } catch (Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }
}
