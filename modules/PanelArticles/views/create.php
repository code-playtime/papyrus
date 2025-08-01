<?php $template->includes("includes/header", null, "Panel") ?>

<div class="content-section">
    <div class="section-header">
        <div class="d-flex justify-content-between">
            <span class="title">Article Create</span>
            <a href="<?= route("panel.articles") ?>">
                <button class="btn btn-sm btn-warning">Back</button>
            </a>
        </div>
    </div>
    <div class="section-body"> 
        <?php $template->includes("articleform", [
            "formUrl" => route("panel.articles.add")
        ], "PanelArticles"); ?>
    </div>
</div>

<?php $template->includes("includes/footer", null, "Panel") ?>
