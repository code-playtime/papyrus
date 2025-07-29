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
        <div class="section-body"></div>
    </div>

<?php inject("includes/footer", ["module" => "Panel"]); ?>
