<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-5 text-center">
            <h1>Register Page</h1>
        </div>
        <div class="col-lg-5">
            <form class="user" method="post" action="<?= base_url('auth/register');?> ">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" >
                    <?= form_error('firstname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" >
                    <?= form_error('lastname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="login" aria-describedby="emailHelp">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="col-lg-12 text-center">
            <p>Do have any account?</p>
            <a href="<?= base_url(); ?>">Login now</a>
        </div>
    </div>
</div>