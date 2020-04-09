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
            <?php if (!isset($_GET['cari'])) : ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
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
                                <td><a class="badge badge-success" data-toggle="modal" data-target="#editDosen" href="<?= base_url('admin/editDosen/') . $d['id_dosen']; ?>">edit</a>
                                    <a class="badge badge-danger" data-toggle="modal" data-target="#hapusDosen" href="<?= base_url('admin/hapusDosen/') . $d['id_dosen']; ?>">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <?php if (isset($_GET['cari'])) :
                $jurusan = $_GET['jurusan'];
                $data = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->row_array(); ?>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($cariDosen as $cd) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $cd['nip']; ?></td>
                                <td><?= $cd['nama']; ?></td>
                                <td><?= $cd['jurusan']; ?></td>
                                <td><?= $cd['pendidikan']; ?></td>
                                <td><?= $cd['jabatan']; ?></td>
                                <td><a class="badge badge-success" data-toggle="modal" data-target="#editDosen" href="<?= base_url('admin/editDosen/') . $cd['id_dosen']; ?>">edit</a>
                                    <a class="badge badge-danger" data-toggle="modal" data-target="#hapusDosen" href="<?= base_url('admin/hapusDosen/') . $cd['id_dosen']; ?>">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>

        </div>
    </div>

    <!-- modal-->
    <div class="modal fade" id="addDosen" tabindex="-1" role="dialog" aria-labelledby="addDosenLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDosenLabel">Add New Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tambahDosen'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
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
                                <option value="Lektor">Lektor</option>
                                <option value="Asisten Ahli">Asisten Ahli</option>
                                <option value="Guru Besar">Guru Besar</option>
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

        <!-- Modal -->



        <!-- Modal -->
        <div class="modal fade" id="hapusDosen" tabindex="-1" role="dialog" aria-labelledby="hapusDosenLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusDosenLabel">Delete Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu/delete/' . $m['id']); ?>" method="get">
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
    </div>
</div>