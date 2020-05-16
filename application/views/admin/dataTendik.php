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
                    <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#addTendik" href="">Tambah Tendik Peserta</a>
                    <a class="btn btn-success mb-4" href="<?= base_url('admin/dataTendik'); ?>">Semua Data Tendik Peserta</a>
                </div>
                <div class="col-sm-3">
                    <form action="<?= base_url('admin/dataTendik'); ?>" method="get">
                        <div class="form-group">
                            <select class="form-control" name="tendik" id="tendik">
                                <option value="">Cari Berdasarkan Kategori</option>
                                <option value="Administrasi Prodi">Administrasi Prodi</option>
                                <option value="Laboratorium">Laboratorium</option>
                                <option value="Perpustakaan">Perpustakaan</option>

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
                            <th scope="col">Tendik</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dataTendik as $t) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $t['nip']; ?></td>
                                <td><?= $t['nama']; ?></td>
                                <td><?= $t['tendik']; ?></td>
                                <td><?= $t['jurusan']; ?></td>
                                <td><a class="badge badge-success" data-toggle="modal" data-target="#editTendik<?= $t['id_tendik'] ?>" href="#">edit</a>
                                    <a class="badge badge-danger" data-toggle="modal" data-target="#hapusTendik<?= $t['id_tendik']; ?>" href="#">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <?php if (isset($_GET['cari'])) :
                $tendik = $_GET['tendik'];
                $data = $this->db->get_where('tendik_peserta', ['tendik' => $tendik])->row_array(); ?>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tendik</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($cariTendik as $ct) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $ct['nip']; ?></td>
                                <td><?= $ct['nama']; ?></td>
                                <td><?= $ct['tendik']; ?></td>
                                <td><?= $ct['jurusan']; ?></td>
                                <td><a class="badge badge-success" data-toggle="modal" data-target="#editTendik<?= $ct['id_tendik'] ?>" href="#">edit</a>
                                    <a class="badge badge-danger" data-toggle="modal" data-target="#hapusTendik<?= $ct['id_tendik']; ?>" href="#">delete</a>
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
    <div class="modal fade" id="addTendik" tabindex="-1" role="dialog" aria-labelledby="addTendikLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTendikLabel">Tambah Tendik Peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tambahTendik'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <select name="tendik" id="tendik" class="form-control">
                                <option value="">Pilih Tendik</option>
                                <option value="Administrasi Prodi">Administrasi Prodi</option>
                                <option value="Laboratorium">Laboratorium</option>
                                <option value="Perpustakaan">Perpustakaan</option>
                            </select>
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


        <!-- Modal -->



        <!-- Modal -->
    </div>

    <?php foreach ($dataTendik as $td) : ?>

        <div class="modal fade" id="hapusTendik<?= $td['id_tendik']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusTendikLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusTendikLabel">Hapus Tendik Peserta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/hapusTendik/' . $td['id_tendik']); ?>" method="get">
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
</div>