<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="row">
                <div class="col-sm-3">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">

                    <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#addpimpinan" href="">Tambah Pimpinan user</a>
                    <a class="btn btn-success mb-4" href="<?= base_url('admin/pimpinan'); ?>">Semua Data pimpinan Peserta / User</a>
                </div>
                <div class="col-sm-3">
                    <form action="<?= base_url('admin/pimpinan'); ?>" method="get">
                        <div class="form-group">
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value="">Cari Berdasarkan Jurusan</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Teknik Kimia">Teknik Kimia</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                                <option value="Arsitektur">Arsitektur</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="D3OAB">D3OAB</option>
                            </select>
                        </div>
                        <input type="submit" name="cari" class="btn btn-primary mb-3" value="Cari">

                    </form>
                </div>
                <div class="col-sm-5">


                </div>
            </div>
            <?php if (empty($pimpinan)) : ?>

                <div class="alert alert-danger">
                    Data tidak ditemukan.
                </div>
            <?php endif; ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pimpinan as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $d['nip']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['jurusan']; ?></td>
                            <td><?= $d['jabatan']; ?></td>
                            <td><a class="badge badge-success" data-toggle="modal" data-target="#editpimpinan<?= $d['id_pimpinan'] ?>" href="#">edit</a>
                                <a class="badge badge-danger" data-toggle="modal" data-target="#hapuspimpinan<?= $d['id_pimpinan']; ?>" href="#">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="modal fade" id="addpimpinan" tabindex="-1" role="dialog" aria-labelledby="addpimpinanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addpimpinanLabel">Tambah pimpinan User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahpimpinan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="nip">
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="">Pilih Jurusan</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Kimia">Teknik Kimia</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Arsitektur">Arsitektur</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="D3OAB">D3OAB</option>
                            <option value="Perpustakaan">Perpustakaan</option>
                        </select><?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="jabatan" id="jabatan">
                            <option value="">Pilih jabatan</option>
                            <option value="Kepala Program Studi">Kepala Program Studi</option>
                            <option value="Kepala Laboratorium">Kepala Laboratorium</option>
                            <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                        </select> <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal -->



<!-- Modal -->

<?php foreach ($pimpinan as $d) : ?>
    <div class="modal fade" id="hapuspimpinan<?= $d['id_pimpinan']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapuspimpinanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapuspimpinanLabel">Hapus pimpinan Peserta / User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/hapuspimpinan/' . $d['id_pimpinan']); ?>" method="get">
                    <div class="modal-body">
                        Are You Sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($pimpinan as $d) : ?>
    <div class="modal fade" id="editpimpinan<?= $d['id_pimpinan']; ?>" tabindex="-1" role="dialog" aria-labelledby="editpimpinanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editpimpinanLabel">Edit pimpinan Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editpimpinan/' . $d['id_pimpinan']); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_pimpinan" value="<?= $d['id_pimpinan']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="nip" value="<?= $d['nip']; ?>">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama']; ?>" placeholder="Nama">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $d['email']; ?>" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <select name="jurusan" id="jurusan" class="form-control">
                                <option value="">Pilih Jurusan</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
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
                        <div class="form-group">
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option value="">Pilih jabatan</option>
                                <option value="Kepala Program Studi">Kepala Program Studi</option>
                                <option value="Kepala Laboratorium">Kepala Laboratorium</option>
                                <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                            </select> <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php endforeach; ?>