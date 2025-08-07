<?php $template->includes("layouts/header") ?>

<div class="container min-h-full">
    <div class="row min-h-full align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 register-div">
            <div class="header">
                <h2>Verify</h2>
            </div>
            <div class="body">
                <?php $template->includes("includes/messages") ?>
                <form method="post" action="<?= route("auth.verify-answers") ?>">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="answer_1">
                                    <?= $question_1 ?>
                                </label>
                                <input type="text" class="form-control" name="answer_1" id="answer_1" placeholder="Your answer" required />
                            </div>
                        </div> 

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="answer_2">
                                    <?= $question_2 ?>
                                </label>
                                <input type="text" class="form-control" name="answer_2" id="answer_2" placeholder="Your answer" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="answer_3">
                                    <?= $question_3 ?>
                                </label>
                                <input type="text" class="form-control" name="answer_3" id="answer_3" placeholder="Your answer" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-large btn-primary">Verify Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $template->includes("layouts/footer") ?>
