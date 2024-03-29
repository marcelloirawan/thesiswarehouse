
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Login!</h1>
                                    </div>

									<!-- message -->
									<?= $this->session->flashdata('message'); ?>

                                    <form class="user" method="post" action="<?= base_url('welcome/cek_login'); ?>">
                                        <div class="form-group">
                                            <input name="email" id="email" type="email" class="form-control form-control-user" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input name="password" id="password" type="password" class="form-control form-control-user form-password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Show password</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
									
                                    <hr>
                                    <div class="text-center" hidden>
                                        <a class="small" href="<?= base_url('welcome/register'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
