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
                                <form class="user" action="<?= base_url('auth') ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="id" name="id" placeholder="NIDN/NIM" value="<?= set_value('nip'); ?>">
                                        <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="role" id="role">
                                            <option value="">Pilih Role</option>
                                            <option value="Pimpinan">Pimpinan</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="LPPM">UKM</option>
                                        </select> <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>auth/lupa_password">Lupa Password</a><br>
                                    <a class="small" href="<?= base_url(); ?>auth/auth_tendik">Login sebagai pimpinan Tendik</a><br>
                                    <a class="small" href="<?= base_url(); ?>auth/auth_admin">Login sebagai Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>