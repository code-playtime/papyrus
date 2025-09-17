<?php $template->includes("includes/header", null, "Panel") ?>

<div class="content-section">
    <div class="section-header">
        <div class="d-flex justify-content-between align-content-center">
            <span class="title">Create New Book</span>
            <a href="<?= route("panel.books") ?>">
                <button class="btn btn-sm btn-warning">Back</button>
            </a>
        </div>
    </div>

    <div class="section-body">
        <?php $template->includes("bookform", [
            "formUrl" => ""
        ], "PanelBooks") ?>
    </div>
</div>

<?php $template->includes("includes/footer", null, "Panel") ?>
