<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" action="<?= base_url('auth/auth_admin') ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php if (isset($_COOKIE["username"])) : echo $_COOKIE['username'];
                                                                                                                                            endif; ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php if (isset($_COOKIE["password"])) : echo $_COOKIE['password'];
                                                                                                                                                endif; ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" <?php if (isset($_COOKIE["username"])) { ?> checked="checked" <?php } ?>> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>

                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>