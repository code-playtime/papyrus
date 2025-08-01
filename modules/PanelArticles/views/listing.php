<?php inject("includes/header", ["module" => "Panel"]); ?>
    
    <?php inject("includes/pagebar", [
        "module" => "Panel",
        "args" => [
            "pageTitle" => "Articles",
            "pageNavs" => ["Home", "Articles"]
        ]
    ]); ?>

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
            <?php inject("includes/messages", ["module" => "Auth"]) ?>

            <?php
                if(isset($articles) && $articles->count() > 0) {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($articles->getData() as $article) {
                                ?>
                                    <tr>
                                        <td><?= $article["id"] ?? "" ?></td>
                                        <td><?= $article["title"] ?? "" ?></td>
                                        <td><?= $article["created_at"] ?? "" ?></td>
                                        <td>
                                            <a href="">
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                            </a>
                                            <a href="">
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>

<?php inject("includes/footer", ["module" => "Panel"]); ?>
