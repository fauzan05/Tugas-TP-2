<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width:auto;">
            <div class="card-body">
                <div class="col-lg-5 text-center" style="width: 50rem;">
                    <form action="" method="post">
                        <?php if ($this->session->flashdata('message')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <input type="password" name="oldPassword" class="form-control" id="oldPassword">
                            <?= form_error('oldPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" name="newPassword" class="form-control" id="newPassword">
                            <?= form_error('newPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4" style="width: 50rem;">Save Changes</button>
                    </form>
                </div>
            </div>
            <a href="<?= base_url(); ?>user" type="button" class="btn btn-primary m-3">Back</a>
        </div>
    </div>
</div>