<div class="container py-5 d-flex justify-content-center">
    <div class="card bg-light ">
        <div class="card-body  p-5 text-center">

            <div class="mb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Forgot Password</h2>
                <hr class="mb-5 mx-5">

                <?php if(session()->getFlashdata('error')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif;?>
                <?php if(session()->getFlashdata('success')):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif;?>
                
                <p>Enter your email address to reset your password</p>

                <form action="forgotPassword" method="post">

                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= old('email') ?>" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark btn-lg" id="grad" type="submit">Submit</button>
                    </div>

                </form>

            </div>

            <div>
                <p class="mb-0 small">Don't have an account? <a href="\Register" class="fw-bold">Sign Up</a></p>
            </div>
                        
                    
        </div>
    </div>
</div>