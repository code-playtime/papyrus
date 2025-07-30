<?php inject("includes/header", ["module" => "Panel"]); ?>

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
        <?php inject("articleform", ["module" => "PanelArticles"]) ?>
    </div>
</div>

<?php inject("includes/footer", ["module" => "Panel"]); ?>
