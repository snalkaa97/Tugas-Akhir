<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <form action="<?= base_url('admin/normalisasi_tendik_WP'); ?>" method="get">
        <div class="row">
            <div class="col-lg-4">
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
                <input class="btn btn-outline-primary" type="submit" name="hitung" value="Hitung">
            </div>
        </div>
    </form>
    <?php if (empty($nilaitendik)) : ?>

        <div class="alert alert-danger">
            Data tidak ditemukan.
        </div>
    <?php endif; ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tendik</th>
                <th>Jurusan</th>
                <th>Tendik</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($nilaitendik as $nd) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $nd['nama']; ?></td>
                    <td><?= $nd['jurusan']; ?></td>
                    <td><?= $nd['tendik']; ?></td>
                    <td><?= round($nd['c1'], 4); ?></td>
                    <td><?= $nd['c2']; ?></td>
                    <td><?= $nd['c3']; ?></td>
                    <td><?= $nd['c4']; ?></td>
                    <td><?= $nd['c5']; ?></td>
                    <td><?= $nd['c6']; ?></td>
                <?php $i++;
            endforeach; ?>
                </tr>
        </tbody>
    </table>

    <?php if (isset($_GET['hitung'])) : ?>
        <div class="row">
            <div class="col-sm-12">
                <h1 class="h3 mb-4 text-gray-800">Perbaikan Bobot</h1>
                <table class="table table-hover">
                    <thead>
                        <th>Bobot</th>
                        <?php foreach ($bobot as $b) : ?>
                            <th text-align="center"><?= $b['nama_kriteria']; ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bobot Awal</td>
                            <?php foreach ($bobot as $b) : ?>
                                <td align="center"><?= $b['bobot']; ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <td>Bobot Baru</td>
                            <?php $i = 0;
                            $jml = 0; //penjumlahan bobot
                            foreach ($bobot as $b) {
                                $jml = $jml + $b['bobot'];
                            }
                            ?>
                            <?php foreach ($bobot as $b) :
                                $bobotbaru = $b['bobot'] / $jml;
                                //var_dump($bobotbaru);
                                $arrBobotbaru[$i] = $bobotbaru;
                                //var_dump($arrBobotbaru[$i]);


                            ?>
                                <td align="center"><?= round($bobotbaru, 4) ?></td>

                            <?php
                                // $data = [
                                //     'bobot_baru' => $bobotbaru[$i]
                                // ];

                                $i++;
                            endforeach; ?>
                        </tr>

                    </tbody>
                </table>
            </div>
            <?php

            foreach ($hitung as $h) {
                $vkt_s = 1;
                for ($c = 1; $c <= 6; $c++) {
                    $tb = "c" . $c;
                    $ab = $c - 1;
                    $pgkt = pow($h[$tb], $arrBobotbaru[$ab]);
                    //echo $h[$tb] . " dipangkat " . $arrBobotbaru[$ab] . " = " . $pgkt . "<br>";
                    $vkt_s = $vkt_s * $pgkt;
                }
                $this->db->where('nip', $h['nip']);
                $this->db->update('tendik_peserta', ['vektor_s' => $vkt_s]);
            }

            $vks_s_sum = 0;
            foreach ($hitung as $h) {
                $vks_s_sum = $vks_s_sum + $h['vektor_s']; //jumlah vektor_s

            }

            foreach ($vektor as $v) {
                $vkt_v = $v['vektor_s'] / $vks_s_sum;
                $this->db->where('nip', $v['nip']);
                $this->db->update('tendik_peserta', ['vektor_v' => $vkt_v]);
            } ?>
            <div class="col-sm-12 alert alert-success">
                <h3>Hasil Ranking</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Nama</th>
                            <th>Vektor_S</th>
                            <th>Vektor_V (Total Nilai WP)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rk = 1;
                        foreach ($vektor as $v) : ?>
                            <tr>
                                <td><?= $rk ?></td>
                                <td><?= $v['nama']; ?></td>
                                <td><?= $v['vektor_s']; ?></td>
                                <td><?= $v['vektor_v']; ?></td>
                            </tr>
                        <?php $rk++;
                        endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="alert alert-primary">
                <h6>Waktu proses perhitungan <?= $waktu ?></h6>
            </div>
        </div>


    <?php endif; ?>
</div>
</div>