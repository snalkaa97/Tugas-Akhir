<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/registration_tendik'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="nama" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <select class="form-control " name="jurusan" id="jurusan">
                                        <option value="">Pilih Jurusan</option>
                                        <option value=" Teknik Sipil">Teknik Sipil</option>
                                        <option value="Teknik Elektro">Teknik Elektro</option>
                                        <option value="Teknik Kimia">Teknik Kimia</option>
                                        <option value="Teknik Mesin">Teknik Mesin</option>
                                        <option value="Teknik Industri">Teknik Industri</option>
                                        <option value="Arsitektur">Arsitektur</option>
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                        <option value="D3OAB">D3OAB</option>
                                        <option value="Perpustakaan">Perpustakaan</option>
                                    </select> <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-sm-6">
                                    <select class="form-control" name="jabatan" id="jabatan">
                                        <option value="">Pilih jabatan</option>
                                        <option value="Kepala Program Studi">Kepala Program Studi</option>
                                        <option value="Kepala Laboratorium">Kepala Laboratorium</option>
                                        <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                                    </select> <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control " id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control " id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div> -->
                            <button type="submit" class="btn btn-success btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>auth">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>