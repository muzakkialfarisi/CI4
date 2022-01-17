<div class="container py-5 d-flex justify-content-center">
    <div class="card bg-light">
        <div class="card-body p-5 text-center" style="width: 350px;">

            <div class="mb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <hr class="mb-5 mx-5">
                <?php if(session()->getFlashdata('error')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif;?>
                <?php if(session()->getFlashdata('success')):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif;?>

                <form action="/Login/Auth" method="post">

                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                    </div>

                    <div class="input-group flex-nowrap mb-4" id="show_hide_password">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required autocomplete="current-password">
                        <a class="input-group-text" id="addon-wrapping"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>

                    
                        <p class="small text-end mb-5"><a class="text-dark-50" href="login\forgotPassword">Forgot password?</a></p>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark btn-lg" id="grad" type="submit">Login</button>
                    </div>

                </form>

            </div>

            <div>
                <p class="mb-0 small">Don't have an account? <a href="\Register" class="fw-bold">Sign Up</a></p>
            </div>
            
        </div>
    </div>
</div>