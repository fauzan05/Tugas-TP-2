    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-lg-5 text-center">
                <h1>Login Page</h1>
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-5">
                <form method="post" action="<?= base_url('auth'); ?>">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="col-lg-12 text-center">
                <p>Don't have any account?</p>
                <a href="<?= base_url(); ?>auth/register">Register now</a>
            </div>
        </div>
    </div>