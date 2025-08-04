<?php $template->includes("includes/header", null, "Panel") ?>

<div class="content-section">
    <div class="section-header">
        <div class="d-flex justify-content-between">
            <span class="title">Article Edit</span>
            <a href="<?= route("panel.articles") ?>">
                <button class="btn btn-sm btn-warning">Back</button>
            </a>
        </div>
    </div>
    <div class="section-body"> 
        <?php $template->includes("articleform", [
            "formUrl" => route("panel.articles.add"),
            "title" => $article["title"],
            "content" => $article["content"],
            "slug" => $article["slug"],
            "tags" => $article["tags"],
            "banner_url" => $banner_url ?? null
        ], "PanelArticles"); ?>
    </div>
</div>

<?php $template->includes("includes/footer", null, "Panel") ?>
