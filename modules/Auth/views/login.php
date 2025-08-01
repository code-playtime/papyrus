<?php $template->includes("layouts/header") ?>

<div class="container min-h-full">
    <div class="row min-h-full align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 register-div">
            <div class="header">
                <h2>Login</h2>
            </div>
            <div class="body">
                <?php $template->includes("includes/messages") ?>
                <form method="post" action="<?= route("auth.signin") ?>">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= old('email') ?>" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="mb-3" for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <a href="<?= route("auth.forgot") ?>">Forgot password?</a>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-large btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->includes("layouts/footer") ?>
