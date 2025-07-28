<?php inject("layouts/header", ["module" => "Auth"]); ?>

<div class="container min-h-full">
    <div class="row min-h-full align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 register-div">
            <div class="header">
                <h2>Forgot Password</h2>
            </div>
            <div class="body">
                <?php
                    inject("includes/messages", ["module" => "Auth"]);
                ?>
                <form method="post" action="<?= route("auth.post-forgot") ?>">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="answer_1">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required />
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

<?php inject("layouts/footer", ["module" => "Auth"]); ?>
