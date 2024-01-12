
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
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>

                                    <form class="user" method="post" action="<?= base_url('welcome/register'); ?>">
                                        <div class="form-group">
                                            <input name="name" id="name" type="text" class="form-control form-control-user" placeholder="Enter Fullname" required>
                                        </div>
                                        <div class="form-group">
                                            <input name="email" id="email" type="email" class="form-control form-control-user" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input name="password1" id="password1" type="password" class="form-control form-control-user form-password" placeholder="Password" required>
                                        </div>
										<div class="form-group">
                                            <input name="password2" id="password2" type="password" class="form-control form-control-user form-password" placeholder="Repeat Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Show password</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url(''); ?>">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
