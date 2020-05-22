<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="alert alert-info">
        <h3>Dosen</h3>
    </div>
    <form action="<?= base_url('admin/index'); ?>" method="get">
        <div class="row">
            <div class="col-lg-4 ">
                <div class="form-group">
                    <select class="form-control" name="jurusan" id="jurusan">
                        <option value="">Cari berdasarkan jurusan</option>
                        <option value=" Teknik Sipil">Teknik Sipil</option>
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
            <div class="col-lg-4">
                <input class="btn btn-outline-primary" type="submit" name="hitung" value="Pilih">
            </div>

        </div>

        <?php if (empty($dosenWP)) : ?>

            <div class="alert alert-danger">
                Data tidak ditemukan.
            </div>
        <?php endif; ?>
    </form>
    <div class="row">
        <div class="col-lg-6">
            <div class="border-bottom-warning">
                <h5 class="font-weight-bold">Ranking Metode WP</h5>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Vektor_V (Total Nilai WP)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rk = 1;
                    foreach ($dosenWP as $v) : ?>
                        <tr>
                            <td class="text-center"><?= $rk ?></td>
                            <td><?= $v['nama']; ?></td>
                            <td class="text-center"><?= $v['jurusan']; ?></td>
                            <td class="text-center"><?= $v['vektor_v']; ?></td>
                        </tr>
                    <?php $rk++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <div class="border-bottom-success">
                <h5 class="font-weight-bold">Ranking Metode SAW</h5>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Vi (Total Nilai SAW)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rk = 1;
                    foreach ($dosenSAW as $v) : ?>
                        <tr>
                            <td class="text-center"><?= $rk ?></td>
                            <td><?= $v['nama']; ?></td>
                            <td class="text-center"><?= $v['jurusan']; ?></td>
                            <td class="text-center"><?= $v['total_nilai_saw']; ?></td>
                        </tr>
                    <?php $rk++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="alert alert-info mt-3">
        <h3>Tendik</h3>
    </div>
    <form action="<?= base_url('admin'); ?>" method="get">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <select class="form-control" name="jurusanTendik" id="jurusan">
                        <option value="">Cari berdasarkan jurusan</option>
                        <option value=" Teknik Sipil">Teknik Sipil</option>
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
            <div class="col-lg-4">
                <div class="form-group">
                    <select class="form-control" name="tendik" id="tendik">
                        <option value="">Cari berdasarkan Tendik</option>
                        <option value="Administrasi Prodi">Administrasi Prodi</option>
                        <option value="Laboratorium">Laboratorium</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <input class="btn btn-outline-primary" type="submit" name="hitung" value="Pilih">
            </div>
        </div>
    </form>
    <?php if (empty($tendikWP && $tendikSAW)) : ?>

        <div class="alert alert-danger">
            Data tidak ditemukan.
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="border-bottom-danger">
                <h5 class="font-weight-bold">Ranking Metode WP</h5>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Tendik</th>
                        <th class="text-center">Vektor_V (Total Nilai WP)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rk = 1;
                    foreach ($tendikWP as $v) : ?>
                        <tr>
                            <td class="text-center"><?= $rk ?></td>
                            <td><?= $v['nama']; ?></td>
                            <td class="text-center"><?= $v['jurusan']; ?></td>
                            <td class="text-center"><?= $v['tendik']; ?></td>
                            <td class="text-center"><?= $v['vektor_v']; ?></td>
                        </tr>
                    <?php $rk++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <div class="border-bottom-secondary">
                <h5 class="font-weight-bold">Ranking Metode SAW</h5>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Tendik</th>
                        <th class="text-center">Vi (Total Nilai SAW)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rk = 1;
                    foreach ($tendikSAW as $v) : ?>
                        <tr>
                            <td class="text-center"><?= $rk ?></td>
                            <td><?= $v['nama']; ?></td>
                            <td class="text-center"><?= $v['jurusan']; ?></td>
                            <td class="text-center"><?= $v['tendik']; ?></td>
                            <td class="text-center"><?= $v['nilai_total_saw']; ?></td>
                        </tr>
                    <?php $rk++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>