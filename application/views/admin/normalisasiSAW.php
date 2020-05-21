<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <form action="<?= base_url('admin/normalisasiSAW'); ?>" method="get">
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
                <input class="btn btn-outline-primary" type="submit" name="hitung" value="Hitung">
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dosen</th>
                <th>Jurusan</th>
                <th>Pendidikan</th>
                <th>Jabatan</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
                <th>C7</th>
                <th>C8</th>
                <th>C9</th>
                <th>C10</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($dosen as $d) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['jurusan']; ?></td>
                    <td><?= $d['pendidikan']; ?></td>
                    <td><?= $d['jabatan']; ?></td>
                    <td><?= $d['c1']; ?></td>
                    <td><?= $d['c2']; ?></td>
                    <td><?= $d['c3']; ?></td>
                    <td><?= $d['c4']; ?></td>
                    <td><?= $d['c5']; ?></td>
                    <td><?= $d['c6']; ?></td>
                    <td><?= $d['c7']; ?></td>
                    <td><?= $d['c8']; ?></td>
                    <td><?= $d['c9']; ?></td>
                    <td><?= $d['c10']; ?></td>
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
                                $this->db->where('id', 1);
                                $this->db->update('tb_bobot_baru', $data);
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
                                <th>C1</th>
                                <th>C2</th>
                                <th>C3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($max as $s) : ?>
                                <tr>
                                    <td><?= $maxc1 = $s['c1']; ?></td>
                                    <td><?= $maxc2 = $s['c2']; ?></td>
                                    <td><?= $maxc3 = $s['c3']; ?></td>
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
                                <th>C4</th>
                                <th>C5</th>
                                <th>C6</th>
                                <th>C7</th>
                                <th>C8</th>
                                <th>C9</th>
                                <th>C10</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($min as $s) : ?>
                                <tr>
                                    <td><?= $minc4 = $s['c4']; ?></td>
                                    <td><?= $minc5 = $s['c5']; ?></td>
                                    <td><?= $minc6 = $s['c6']; ?></td>
                                    <td><?= $minc7 = $s['c7']; ?></td>
                                    <td><?= $minc8 = $s['c8']; ?></td>
                                    <td><?= $minc9 = $s['c9']; ?></td>
                                    <td><?= $minc10 = $s['c10']; ?></td>
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
                            <th>Nama Dosen</th>
                            <?php for ($c = 1; $c <= 10; $c++) : ?>
                                <th>C<?= $c; ?></th>
                            <?php endfor; ?>
                        </tr>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dosen as $d) : ?>
                            <tr>
                                <td><?= $d['nip']; ?></td>
                                <td><?= $d['nama']; ?></td>
                                <td><?= $c1 = round($d['c1'] / $maxc1, 4); ?></td>
                                <td><?= $c2 = round($d['c2'] / $maxc2, 4); ?></td>
                                <td><?= $c3 = round($d['c3'] / $maxc3, 4); ?></td>
                                <td><?= $c4 = round($minc4 / $d['c4'], 4); ?></td>
                                <td><?= $c5 = round($minc5 / $d['c5'], 4); ?></td>
                                <td><?= $c6 = round($minc6 / $d['c6'], 4); ?></td>
                                <td><?= $c7 = round($minc7 / $d['c7'], 4); ?></td>
                                <td><?= $c8 = round($minc8 / $d['c8'], 4); ?></td>
                                <td><?= $c9 = round($minc9 / $d['c9'], 4); ?></td>
                                <td><?= $c10 = round($minc10 / $d['c10'], 4); ?></td>
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
                            <?php for ($c = 1; $c <= 10; $c++) : ?>
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
                                $h1 = $r['b1'] * ($r['c1'] / $maxc1);
                                $h2 = $r['b2'] * ($r['c2'] / $maxc2);
                                $h3 = $r['b3'] * ($r['c3'] / $maxc3);
                                $h4 = $r['b4'] * ($r['c4'] / $minc4);
                                $h5 = $r['b5'] * ($r['c5'] / $minc5);
                                $h6 = $r['b6'] * ($r['c6'] / $minc6);
                                $h7 = $r['b7'] * ($r['c7'] / $minc7);
                                $h8 = $r['b8'] * ($r['c8'] / $minc8);
                                $h9 = $r['b9'] * ($r['c9'] / $minc9);
                                $h10 = $r['b10'] * ($r['c10'] / $minc10);

                                $total = $h1 + $h2 + $h3 + $h5 + $h6 + $h7 + $h8 + $h9 + $h10;
                                $this->db->where('nip', $r['nip']);
                                $this->db->update('dosen_peserta', ['total_nilai_saw' => $total]);
                                ?>
                                <td><?= $ranking; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= round($h1, 4); ?></td>
                                <td><?= round($h2, 4); ?></td>
                                <td><?= round($h3, 4); ?></td>
                                <td><?= round($h4, 4); ?></td>
                                <td><?= round($h5, 4); ?></td>
                                <td><?= round($h6, 4); ?></td>
                                <td><?= round($h7, 4); ?></td>
                                <td><?= round($h8, 4); ?></td>
                                <td><?= round($h9, 4); ?></td>
                                <td><?= round($h10, 4); ?></td>
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

        <?php endif; ?>
        </div>