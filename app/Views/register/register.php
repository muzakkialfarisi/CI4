<div class="container py-5 d-flex justify-content-center">
    <div class="card bg-light">
        <div class="card-body p-5 text-center" >

            <div class="mb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Create Account</h2>
                <hr class="mb-5 mx-5">

                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>

                <form action="<?= current_url() ?>" method="post" enctype="multipart/form-data">

                    <div class="form-outline mb-3">
                        <input type="email" id="email" name="email" class="form-control form-control" placeholder="Email" required/>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="name" name="name" class="form-control form-control" placeholder="Full Name" required/>
                    </div>


                    <div class="input-group flex-nowrap " id="show_hide_password">
                        <input type="password" id="password" name="password" class="form-control form-control" placeholder="Password" required>
                        <a class="input-group-text" id="addon-wrapping"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>
                    <div class="form-text text-start mb-3">- Min 6 characters</div>

                    <div class="input-group flex-nowrap mb-3" id="show_hide_password2">
                        <input type="password" id="confpassword" name="confpassword" class="form-control form-control" placeholder="Confirm Password" required>
                        <a class="input-group-text" id="addon-wrapping"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>

                        
                 

                    <div class="row">
                        <div class="col-3 p-2">Avatar</div>
                        <div class="col-9 form-outline mb-3">
                            <input type="file" name="gambar" class="form-control" id="gambar" accept=".png, .jpg, .jpeg" required/>
                        </div>
                        <div class="form-text small"></div>
                    </div>

                    <div class="d-grid gap-2 my-4">
                        <button class="btn btn-dark btn-lg" id="grad" type="submit">Register</button>
                    </div>
                </div>

            </form>

            <div>
                <p class="mb-0 small">Already have an account? <a href="\Login" class="fw-bold">Login Now</a></p>
            </div>
                    
        
        </div>
    </div>
</div>
