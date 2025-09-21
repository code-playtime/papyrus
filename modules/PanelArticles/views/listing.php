<?php $template->includes("includes/header", null, "Panel") ?>

    <?php $template->includes("includes/pagebar", [
        "pageTitle" => "Articles",
        "pageNavs" => ["Home", "Articles"]
    ], "Panel") ?>

    <div class="content-section">
        <div class="section-header">
            <div class="d-flex justify-content-between align-content-center">
                <span class="title">Listing</span>
                <a href="<?= route("panel.articles.create") ?>">
                    <button class="btn btn-sm btn-primary">Create</button>
                </a>
            </div>
        </div>

        <div class="section-body">
            <?php $this->includes("includes/messages", null, "Auth") ?>

            <?php if (isset($articles) && $articles->count() > 0) : ?>
                <div class="table-responsive">
                    <table class="table table-bordred">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles->getData() as $article) : ?>
                                <tr>
                                    <td><?= $article["id"] ?? "" ?></td>
                                    <td><?= $article["title"] ?? "" ?></td>
                                    <td><?= $article["created_at"] ?? "" ?></td>
                                    <td>
                                        <form action='<?= route("panel.articles.status", ["id" => $article["id"]]) ?>' method="POST" onsubmit="return confirm('Are you sure you want to update?')">
                                    <?= form_method("PATCH") ?>
                                            <input type="hidden" name="status" value="<?= $article['status'] ?? 'draft' ?>" />
                                            <?php if ($article["status"] === "published") : ?>
                                                <button type="submit" class="btn btn-sm btn-success">Published</button>
                                            <?php elseif ($article["status"] === "draft") : ?>
                                                <button type="submit" class="btn btn-sm btn-warning">Draft</button>
                                            <?php endif ?>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="<?= route("panel.articles.edit", ["id" => $article['id']]) ?>">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                        </a> 
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php endif ?>
        </div>
    </div>

<?php $template->includes("includes/footer", null, "Panel") ?>
