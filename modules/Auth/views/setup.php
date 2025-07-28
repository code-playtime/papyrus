<?php inject("layouts/header", ["module" => "Auth"]); ?>

<div class="container min-h-full">
    <div class="row min-h-full align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 register-div">
            <div class="header">
                <h2>Setup</h2>
            </div>
            <div class="body">
                <?php
                inject("includes/messages", ["module" => "Auth"]);
                ?>
                <form method="post" action="<?= route("auth.signin") ?>">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="question_1">Question 1</label>
                                <input type="text" class="form-control" name="question_1" id="question_1" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="answer_1">Answer 1</label>
                                <input type="text" class="form-control" name="answer_1" id="answer_1" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="question_2">Question 2</label>
                                <input type="text" class="form-control" name="question_2" id="question_2" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="answer_2">Answer 2</label>
                                <input type="text" class="form-control" name="answer_2" id="answer_2" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="question_3">Question 3</label>
                                <input type="text" class="form-control" name="question_3" id="question_3" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="answer_3">Answer 3</label>
                                <input type="text" class="form-control" name="answer_3" id="answer_3" />
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-large btn-primary">Finish Setup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php inject("layouts/footer", ["module" => "Auth"]); ?>
