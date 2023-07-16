<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-5 text-center">
            <h1>Dashboard Page</h1>
            <h3>Welcome <?= $firstname; ?></h3>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url();?>user/profile" type="button" class="btn btn-primary mb-3" style="width: 30rem">See Your Profile</a>
                    <a href="<?= base_url();?>user/password" type="button" class="btn btn-primary mb-3" style="width: 30rem">Change Your Password</a>
                    <a href="<?= base_url();?>user/logout" type="button" class="btn btn-danger" style="width: 30rem">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>