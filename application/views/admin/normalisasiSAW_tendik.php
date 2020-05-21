<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <form action="<?= base_url('admin/normalisasi_tendik_SAW'); ?>" method="get">
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
            foreach ($dataTendik as $d) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['jurusan']; ?></td>
                    <td><?= $d['tendik']; ?></td>
                    <td><?= $d['c1']; ?></td>
                    <td><?= $d['c2']; ?></td>
                    <td><?= $d['c3']; ?></td>
                    <td><?= $d['c4']; ?></td>
                    <td><?= $d['c5']; ?></td>
                    <td><?= $d['c6']; ?></td>
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
                            $j = 1;
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
                                $data = [
                                    'b' . $j => $arrBobotbaru[$i]
                                ];
                                $this->db->where('id_bobot', 1);
                                $this->db->update('tb_bobot_baru_tendik', $data);
                                $i++;
                                $j++;
                            endforeach; ?>
                        </tr>

                    </tbody>
                </table>
                <div class="col-sm-12">
                    <h1 class="h3 mb-4 text-gray-800">Nilai Max</h1>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>C2</th>
                                <th>C3</th>
                                <th>C4</th>
                                <th>C5</th>
                                <th>C6</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($max as $s) : ?>
                                <tr>
                                    <td><?= $maxc2 = $s['c2']; ?></td>
                                    <td><?= $maxc3 = $s['c3']; ?></td>
                                    <td><?= $maxc4 = $s['c4']; ?></td>
                                    <td><?= $maxc5 = $s['c5']; ?></td>
                                    <td><?= $maxc6 = $s['c6']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12">
                    <h1 class="h3 mb-4 text-gray-800">Nilai Min</h1>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>C1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($min as $s) : ?>
                                <tr>
                                    <td><?= $minc1 = $s['c1']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12">
                <h3 class="mb-4 text-gray-800">Normalisasi Alternatif</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama tendik</th>
                            <?php for ($c = 1; $c <= 6; $c++) : ?>
                                <th>C<?= $c; ?></th>
                            <?php endfor; ?>
                        </tr>
                    <tbody>
                        <?php $i = 1 ?>;
                        <?php foreach ($tendik as $d) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $d['nama']; ?></td>
                                <td><?= $c1 = round($minc1 / $d['c1'], 4); ?></td>
                                <td><?= $c2 = round($d['c2'] / $maxc2, 4); ?></td>
                                <td><?= $c3 = round($d['c3'] / $maxc3, 4); ?></td>
                                <td><?= $c3 = round($d['c4'] / $maxc4, 4); ?></td>
                                <td><?= $c3 = round($d['c5'] / $maxc5, 4); ?></td>
                                <td><?= $c3 = round($d['c6'] / $maxc6, 4); ?></td>

                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                    </thead>
                </table>
            </div>
            <div class="col-sm-12 alert alert-success">
                <h3 class="mb-4 text-gray-800">Hasil Ranking</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Nama</th>
                            <?php for ($c = 1; $c <= 6; $c++) : ?>
                                <th>C<?= $c ?></th>
                            <?php endfor; ?>
                            <th>Total Nilai</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $ranking = 1;
                        // $bc1 = 0;
                        // foreach ($rank as $r) :
                        //     $ranking++;
                        //     $c1 =  ($r['c1'] / $maxc1);
                        //     $c2 =  ($r['c2'] / $maxc2);
                        //     $c3 =  ($r['c3'] / $maxc3);
                        //     $c4 =  ($r['c4'] / $maxc4);
                        //     $c5 =  ($r['c5'] / $maxc5);
                        //     $c6 =  ($r['c6'] / $maxc6);
                        //     $c7 =  ($r['c7'] / $maxc7);
                        //     $c8 =  ($r['c8'] / $maxc8);
                        //     $c9 =  ($r['c9'] / $maxc9);
                        //     $c10 =  ($r['c10'] / $maxc10);
                        // 
                        // <?php endforeach; 
                        //  foreach ($bobot_baru as $bb) {
                        //     $h1 = $bb['b1'] * $c1;
                        // }
                        // echo $h1;
                        foreach ($rank as $r) : ?>
                            <tr>
                                <?php
                                $h1 = $r['b1'] * ($r['c1'] / $minc1);
                                $h2 = $r['b2'] * ($r['c2'] / $maxc2);
                                $h3 = $r['b3'] * ($r['c3'] / $maxc3);
                                $h4 = $r['b4'] * ($r['c4'] / $maxc4);
                                $h5 = $r['b5'] * ($r['c5'] / $maxc5);
                                $h6 = $r['b6'] * ($r['c6'] / $maxc6);

                                $total = $h1 + $h2 + $h3 + $h5 + $h6;
                                $this->db->where('nip', $r['nip']);
                                $this->db->update('tendik_peserta', ['nilai_total_saw' => $total]);
                                ?>
                                <td><?= $ranking; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= round($h1, 4); ?></td>
                                <td><?= round($h2, 4); ?></td>
                                <td><?= round($h3, 4); ?></td>
                                <td><?= round($h4, 4); ?></td>
                                <td><?= round($h5, 4); ?></td>
                                <td><?= round($h6, 4); ?></td>
                                <td><?= round($total, 4); ?></td>

                            <?php $ranking++;
                        endforeach;
                            ?>
                            </tr>
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