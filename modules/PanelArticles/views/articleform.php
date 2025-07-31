    <form action="<?= $formUrl ?>" id="article-form" method="POST">
        <?= csrf_field() ?>
        <?php inject("includes/messages", ["module" => "Auth"]) ?>
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <input type="text" class="article-title" name="title" id="title" value="<?= $title ?? old('title') ?>" placeholder="Title" />
                </div>
                <hr />
                <div class="mb-3">
                    <div id="editor-container" class="editor-container"></div>
                    <input type="hidden" name="content" id="editor-content" value="<?= $content ?? old('content') ?>" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="card accordion">
                    <div class="card-header accordion-header cursor-pointer">
                        <h6 class="card-title">Article Settings</h6>
                    </div>
                    <div class="card-body accordion-body">
                        <div class="mb-3">
                            <label class="form-label" for="url">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="<?= $slug ?? old('slug') ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="tags">Tags</label>
                            <textarea class="form-control no-resize" rows="2" name="tags" id="tags">
                                <?= $tags ?? old("tags") ?>
                            </textarea>
                            <span class="label-xs">Seperate tags with comma(,)</span>
                        </div>
                    </div>
                </div>
                <br />
                <div class="card accordion">
                    <div class="card-header accordion-header cursor-pointer">
                        <h6 class="card-title">Media</h6>
                    </div>
                    <div class="card-body collapse accordion-body">
                        <label class="form-label" for="banner-image">Banner Image</label>
                        <input type="file" class="form-control" accept="image/*" name="banner" id="banner-image" />

                        <div class="" id="banner-preview">
                            <img src="<?= asset('uploads/images/uploaded-image.png') ?>" id="preview" alt="Banner Preview" />
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card accordion">
                    <div class="card-header accordion-header cursor-pointer">
                        <h6 class="card-title">Meta Data (Optional)</h6>
                    </div>
                    <div class="card-body collapse accordion-body">
                        <div class="mb-3">
                            <label class="form-label" for="meta-title">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" id="meta-title" value="<?= $meta_title ?? old('meta_title') ?>" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="meta-description">Meta Description</label>
                            <textarea class="form-control no-resize" rows="3" name="meta_description" id="meta-description">
                                <?= $meta_description ?? old('meta_description') ?>
                            </textarea>
                        </div>

                        <div class="md-3">
                            <label class="form-label" for="meta-tags">Meta Tags</label>
                            <textarea class="form-control no-resize" rows="2" name="meta_tags" id="meta-tags">
                                <?= $meta_tags ?? old('meta_tags') ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <br />
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
