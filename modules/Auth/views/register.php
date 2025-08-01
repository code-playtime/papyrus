<?php $this->includes("layouts/header") ?>

<div class="container min-h-full">
    <div class="row min-h-full align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 register-div">
            <div class="header">
                <h2>Register</h2>
            </div>
            <div class="body">
                <?php $template->includes("includes/messages") ?>
                <form method="post" action="<?= route("auth.register") ?>">
                    <?= csrf_field() ?>
                    <div class="row">
                       <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="control-label" for="name">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="mb-3" for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="mb-3" for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-large btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $template->includes("layouts/footer") ?>
