<?php inject("layouts/header", ["module" => "Auth"]); ?>

<div class="container min-h-full">
    <div class="row min-h-full align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 register-div">
            <div class="header">
                <h2>Reset Password</h2>
            </div>
            <div class="body">
                <?php
                inject("includes/messages", ["module" => "Auth"]);
                ?>
                <form method="post" action="<?= route("auth.reset") ?>">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="mb-3" for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="mb-3" for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-large btn-primary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php inject("layouts/footer", ["module" => "Auth"]); ?>
