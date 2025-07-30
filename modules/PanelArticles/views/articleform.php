    <form action="<?= route('panel.articles.add') ?>" id="article-form" method="POST">
        <?= csrf_field() ?>
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="content">Content</label>
                    <div id="editor-container" class="editor-container"></div>
                    <input type="hidden" name="content" id="editor-content" value="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="url">Slug</label>
                    <input type="text" class="form-control" name="url" id="url" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tags">Tags</label>
                    <textarea class="form-control no-resize" rows="2" name="tags" id="tags"></textarea>
                    <span>Seperate tags with comma(,)</span>
                </div>
            </div>
        </div>
    </form>
