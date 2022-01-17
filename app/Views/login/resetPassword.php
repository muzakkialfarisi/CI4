<div class="container py-5 d-flex justify-content-center">
    <div class="card bg-light">
        <div class="card-body p-5 text-center">

            <div class="mb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
                <hr class="mb-5 mx-5">

                <?php if(session()->getFlashdata('error')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif;?>
                <?php if(session()->getFlashdata('success')):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif;?>

                <?= form_open();?>

                    <div class="input-group flex-nowrap mb-3" id="show_hide_password">
                        <input type="password" id="password" name="password" class="form-control form-control" placeholder="New Password" required>
                        <a class="input-group-text" id="addon-wrapping"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>
                    
                    <div class="input-group flex-nowrap mb-5" id="show_hide_password2">
                        <input type="password" id="confpassword" name="confpassword" class="form-control form-control" placeholder="Confirm New Password" required>
                        <a class="input-group-text" id="addon-wrapping"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark btn-lg" id="grad" type="submit">Update</button>
                    </div>

                <?= form_close();?>

            </div>

        </div>
    </div>
</div>