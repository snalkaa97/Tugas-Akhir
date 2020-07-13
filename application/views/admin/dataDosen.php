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
                    <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#addDosen" href="">Tambah Dosen Peserta</a>
                    <a class="btn btn-success mb-4" href="<?= base_url('admin/dataDosen'); ?>">Semua Data Dosen Peserta</a>
                </div>
                <div class="col-sm-3">
                    <form action="<?= base_url('admin/dataDosen'); ?>" method="get">
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
                        <input type="submit" name="cari" class="btn btn-primary" value="Cari">

                    </form>
                </div>
                <div class="col-sm-5">


                </div>
            </div>
            <?php if (empty($dosen)) : ?>

                <div class="alert alert-danger">
                    Data tidak ditemukan.
                </div>
            <?php endif; ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIDN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dosen as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $d['nip']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['jurusan']; ?></td>
                            <td><?= $d['pendidikan']; ?></td>
                            <td><?= $d['jabatan']; ?></td>
                            <td><a class="badge badge-success" data-toggle="modal" data-target="#editdosen<?= $d['id_dosen'] ?>" href="#">edit</a>
                                <a class="badge badge-danger" data-toggle="modal" data-target="#hapusdosen<?= $d['id_dosen']; ?>" href="#">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- modal-->
    <div class="modal fade" id="addDosen" tabindex="-1" role="dialog" aria-labelledby="addDosenLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDosenLabel">Tambah Dosen Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tambahDosen'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="NIDN">
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
                        <div class="form-group">
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option value="">Pilih pendidikan</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="">Pilih Jabatan</option>
                                <option value="Guru Besar">Guru Besar</option>
                                <option value="Lektor Kepala">Lektor Kepala</option>
                                <option value="Asisten Ahli">Asisten Ahli</option>
                                <option value="Pengajar">Pengajar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
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

    <?php foreach ($dosen as $d) : ?>
        <div class="modal fade" id="hapusdosen<?= $d['id_dosen']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusDosenLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusDosenLabel">Hapus Dosen Peserta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/hapusDosen/' . $d['id_dosen']); ?>" method="get">
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


    <?php foreach ($dosen as $d) : ?>
        <div class="modal fade" id="editdosen<?= $d['id_dosen']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDosenLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDosenLabel">Edit Dosen Peserta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/editDosen/' . $d['id_dosen']); ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="id_dosen" value="<?= $d['id_dosen']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="NIDN" value="<?= $d['nip']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama']; ?>" placeholder="Nama">
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
                            <div class="form-group">
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <option value="">Pilih pendidikan</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="jabatan" id="jabatan" class="form-control">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="Guru Besar">Guru Besar</option>
                                    <option value="Lektor Kepala">Lektor Kepala</option>
                                    <option value="Asisten Ahli">Asisten Ahli</option>
                                    <option value="Pengajar">Pengajar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $d['alamat']; ?>" placeholder="Alamat">
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
</div>
</div>