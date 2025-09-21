<?php

namespace Module\PanelBooks\Services;

use Papyrus\Database\Pdo;
use Papyrus\Support\Storage;
use Exception;
use Module\Main\ServiceResult;
use Module\PanelBooks\Queries\InsertBook;

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
