<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width:auto;">
            <div class="card-body">
                <div class="col-lg-5 text-center" style="width: 50rem;">
                    <h1>Your Profile Details</h1>
                    <h3>Id : <?= $id; ?></h3>
                    <h3>Firstname : <?= $firstname; ?></h3>
                    <h3>Lastname : <?= $lastname; ?></h3>
                    <h3>Email : <?= $email; ?></h3>
                    <h3>Role : <?= $roleId; ?></h3>
                </div>
            </div>
            <a href="<?= base_url();?>user" type="button" class="btn btn-primary m-5">Back</a>
        </div>
    </div>
</div>