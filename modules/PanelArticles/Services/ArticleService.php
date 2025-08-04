<?php

    namespace Module\PanelArticles\Services;

    use Papyrus\Facades\Pdo;
    use Papyrus\Facades\Storage;

    use Exception;

    use Module\Main\ServiceResult;
    use Module\PanelArticles\Queries\InsertArticle;
    use Module\PanelArticles\Queries\PaginateArticles;
    use Module\PanelArticles\Queries\GetArticleCount;
    use Module\PanelArticles\Queries\FindArticleById;

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
            } catch(Exception $e) {
                $result->setSuccess(false);
                $result->setMessage($e->getMessage());
            }

            return $result;
        }

        private function getArticleCount() {
            $query = Pdo::execute(new GetArticleCount());
            $count = $query->first()["count"] ?? 0;

            return (int) $count;
        }

        private function getBannerUrl($banner) {
            $path = "banners/" . $banner;
            $storage_path = Storage::has($path) ? Storage::url($path) : null;
            return $storage_path;
        }

        public function findArticleById($id) {
            $result = new ServiceResult();

            try {
                $query = Pdo::execute(new FindArticleById([":id" => $id]));
                if($query->count() > 0) {
                    $article = $query->first();
                    $result->setSuccess(true);
                    $result->setData([
                        "article" => $article,
                        "banner_url" => $this->getBannerUrl($article["banner"])
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
    }
