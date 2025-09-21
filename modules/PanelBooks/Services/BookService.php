<?php

namespace Module\PanelBooks\Services;

use Papyrus\Database\Pdo;
use Papyrus\Support\Storage;
use Exception;
use Module\Main\ServiceResult;
use Module\PanelBooks\Queries\GetBookCount;
use Module\PanelBooks\Queries\InsertBook;
use Module\PanelBooks\Queries\PaginateBooks;

class BookService {
    public function addBook($request) {
        $result = new ServiceResult();

        try {
            $query = Pdo::execute(new InsertBook([
                ":title" => $request->sanitizeInput("title"),
                ":description" => $request->input("description"),
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
            $result->setMessage("Book has been saved successfully.");
            $result->setData(["id" => $query->getId()]);

        } catch (Exception $e) {
            $request->remember();
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }

    public function getBookListing($request) {
        $result = new ServiceResult();

        try {
            $totalRows = (int) $this->getBookCount();
            $limit = 10;
            $currentPage = (int) $request->param("page") ?? 1;
            $currentPage = max(1, $currentPage);
            $totalPages = ceil($totalRows / $limit);
            $offset = ($currentPage - 1) * $limit;
            $query = Pdo::execute(new PaginateBooks([
                ":limit" => (int) $limit,
                ":offset" => (int) $offset
            ]));

            $prev_page = $currentPage - 1;
            $prev_page = $prev_page < 0 ? 1 : $prev_page;
            $next_page = $currentPage + 1;
            $next_page = $next_page > $totalPages ? 0 : $next_page;

            $result->setSuccess(true);
            $result->setData([
                "books" => $query,
                "meta" => [
                    "total_pages" => $totalPages,
                    "current_page" => $currentPage,
                    "prev_page" => $prev_page,
                    "next_page" => $next_page
                ]
            ]);
        } catch(Exception $e) {
            $result->setSuccess(false);
            $result->setMessage($e->getMessage());
        }

        return $result;
    }

    private function getBookCount() {
        $query = Pdo::execute(new GetBookCount());
        $count = $query->first()["count"];

        return (int) $count;
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
}
