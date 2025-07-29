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
        <form action="" method="POST">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="content">Content</label>
                        <textarea class="form-control" rows="5" name="content" id="content"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="url">Url</label>
                        <input type="text" class="form-control" name="url" id="url" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tags">Tags</label>
                        <textarea class="form-control no-resize" rows="3" name="tags" id="tags"></textarea>
                        <span>Seperate tags with comma(,)</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php inject("includes/footer", ["module" => "Panel"]); ?>
