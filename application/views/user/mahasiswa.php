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

                    <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#addmahasiswa" href="">Tambah Mahasiswa user</a>
                    <a class="btn btn-success mb-4" href="<?= base_url('admin/mahasiswa'); ?>">Semua Data mahasiswa User</a>
                </div>
                <div class="col-sm-3">
                    <form action="<?= base_url('admin/mahasiswa'); ?>" method="get">
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
            <?php if (empty($mahasiswa)) : ?>

                <div class="alert alert-danger">
                    Data tidak ditemukan.
                </div>
            <?php endif; ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $d['nim']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['jurusan']; ?></td>
                            <td><a class="badge badge-success" data-toggle="modal" data-target="#editmahasiswa<?= $d['nim'] ?>" href="#">edit</a>
                                <a class="badge badge-danger" data-toggle="modal" data-target="#hapusmahasiswa<?= $d['nim']; ?>" href="#">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal-->
<div class="modal fade" id="addmahasiswa" tabindex="-1" role="dialog" aria-labelledby="addmahasiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addmahasiswaLabel">Tambah mahasiswa User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahmahasiswa'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="nim">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
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
                        </select>
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

<?php foreach ($mahasiswa as $d) : ?>
    <div class="modal fade" id="hapusmahasiswa<?= $d['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusmahasiswaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusmahasiswaLabel">Hapus mahasiswa Peserta / User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/hapusmahasiswa/' . $d['nim']); ?>" method="get">
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

<?php foreach ($mahasiswa as $d) : ?>
    <div class="modal fade" id="editmahasiswa<?= $d['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="editmahasiswaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmahasiswaLabel">Edit mahasiswa Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editmahasiswa/' . $d['nim']); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="nim" value="<?= $d['nim']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $d['nim']; ?>">
                            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama']; ?>" placeholder="Nama">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            </select> <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
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