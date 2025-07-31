<?php

    namespace Module\PanelArticles\Services;

    use Devyuha\Lunaris\Facades\Pdo;
    use Devyuha\Lunaris\Facades\Storage;

    use Exception;

    use Module\Main\ServiceResult;
    use Module\PanelArticles\Queries\InsertArticle;

    class ArticleService {
        public function addArticle($request) {
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

        private function uploadBannerImage($file) {
            $name = date("Ymdhsi");
            $storage = Storage::open($file, $name, "banners");
            if($storage->upload()) {
                return $storage->getName();
            }

            return null;
        }

        public function getArticleListing($request) {
            //
        }
    }
