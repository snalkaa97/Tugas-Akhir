<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <h5 class="alert alert-primary"><?php echo "$peserta[nama]" . " - $peserta[tendik]"; ?></h5>
    <form action="<?= base_url('tendik/input_nilai'); ?>" method="post">
        <input type="hidden" value="<?= $peserta['id_tendik'] ?>" name="id_tendik">
        <?php
        $q1 = 0;
        $q2 = 0;
        $q3 = 0;
        $q4 = 0;
        $q5 = 0;
        $q6 = 0;
        $q7 = 0;
        $q8 = 0;
        $q9 = 0;
        $q10 = 0;
        $q11 = 0;
        $q12 = 0;
        $q13 = 0;
        $q14 = 0;
        $q15 = 0;
        $q16 = 0;
        $q17 = 0;
        $q18 = 0;
        $q19 = 0;
        $q20 = 0;
        $q21 = 0;
        $q22 = 0;
        $q23 = 0;
        $q24 = 0;
        $q25 = 0;
        $q26 = 0;
        $q27 = 0;
        $q28 = 0;
        $q29 = 0;
        //var_dump($num);
        if ($num > 0) {
            $q1 = $num['q1'];
            $q2 = $num['q2'];
            $q3 = $num['q3'];
            $q4 = $num['q4'];
            $q5 = $num['q5'];
            $q6 = $num['q6'];
            $q7 = $num['q7'];
            $q8 = $num['q8'];
            $q9 = $num['q9'];
            $q10 = $num['q10'];
            $q11 = $num['q11'];
            $q12 = $num['q12'];
            $q13 = $num['q13'];
            $q14 = $num['q14'];
            $q15 = $num['q15'];
            $q16 = $num['q16'];
            $q17 = $num['q17'];
            $q18 = $num['q18'];
            $q19 = $num['q19'];
            $q20 = $num['q20'];
            $q21 = $num['q21'];
            $q22 = $num['q22'];
            $q23 = $num['q23'];
            $q24 = $num['q24'];
            $q25 = $num['q25'];
            $q26 = $num['q26'];
            $q27 = $num['q27'];
            $q28 = $num['q28'];
            $q29 = $num['q29'];
        }

        ?>
        <div class="row">
            <div class="col-lg-6">
                <h5 class="alert alert-info">A. Kehadiran</h5>
                <h5>Kehadiran min 40 jam/minggu</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q1" value="5" <?php if ($q1 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q1" value="4" <?php if ($q1 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q1" value="3" <?php if ($q1 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q1" value="2" <?php if ($q1 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q1" value="1" <?php if ($q1 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Masuk tepat waktu dan pulang tidak lebih awal</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q2" value="5" <?php if ($q2 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q2" value="4" <?php if ($q2 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q2" value="3" <?php if ($q2 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q2" value="2" <?php if ($q2 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q2" value="1" <?php if ($q2 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Tidak menghilang di jam kerja dalam waktu lama</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q3" value="5" <?php if ($q3 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q3" value="4" <?php if ($q3 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q3" value="3" <?php if ($q3 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q3" value="2" <?php if ($q3 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q3" value="1" <?php if ($q3 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Kehadiran mengikuti senam</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q4" value="5" <?php if ($q4 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q4" value="4" <?php if ($q4 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q4" value="3" <?php if ($q4 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q4" value="2" <?php if ($q4 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q4" value="1" <?php if ($q4 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Kehadiran mengikuti pengajian</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q5" value="5" <?php if ($q5 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q5" value="4" <?php if ($q5 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q5" value="3" <?php if ($q5 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q5" value="2" <?php if ($q5 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q5" value="1" <?php if ($q5 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Kehadiran mengikuti rapat</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q6" value="5" <?php if ($q6 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q6" value="4" <?php if ($q6 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q6" value="3" <?php if ($q6 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q6" value="2" <?php if ($q6 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q6" value="1" <?php if ($q6 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>




            </div>
            <div class="col-lg-6">
                <h5 class="alert alert-info">B. Tanggung Jawab Pekerjaan</h5>
                <h5>Tuntas menyelesaikan tugas</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q7" value="5" <?php if ($q7 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q7" value="4" <?php if ($q7 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q7" value="3" <?php if ($q7 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q7" value="2" <?php if ($q7 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q7" value="1" <?php if ($q7 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>

                <h5 class="mt-4">Menyelesaikan tugas tepat waktu</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q8" value="5" <?php if ($q8 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q8" value="4" <?php if ($q8 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q8" value="3" <?php if ($q8 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q8" value="2" <?php if ($q8 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q8" value="1" <?php if ($q8 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Mengerjakan pekerjaan dengan benar</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q9" value="5" <?php if ($q9 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q9" value="4" <?php if ($q9 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q9" value="3" <?php if ($q9 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q9" value="2" <?php if ($q9 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q9" value="1" <?php if ($q9 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Mempunyai inisiatif perbaikan</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q10" value="5" <?php if ($q10 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q10" value="4" <?php if ($q10 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q10" value="3" <?php if ($q10 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q10" value="2" <?php if ($q10 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q10" value="1" <?php if ($q10 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Mengakui kesalahan bila terjadi kekeliruan</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q11" value="5" <?php if ($q11 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q11" value="4" <?php if ($q11 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q11" value="3" <?php if ($q11 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q11" value="2" <?php if ($q11 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q11" value="1" <?php if ($q11 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
            </div>





            <div class="col-lg-6 mt-4">
                <h5 class="alert alert-info">C. Kerjasama</h5>
                <h5 class="mt-4">Dapat bekerjasama/komunikasi dengan atasan</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q12" value="5" <?php if ($q12 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q12" value="4" <?php if ($q12 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q12" value="3" <?php if ($q12 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q12" value="2" <?php if ($q12 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q12" value="1" <?php if ($q12 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Dapat bekerjasama dengan teman sejawat</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q13" value="5" <?php if ($q13 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q13" value="4" <?php if ($q13 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q13" value="3" <?php if ($q13 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q13" value="2" <?php if ($q13 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q13" value="1" <?php if ($q13 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>

                <h5 class="mt-4">Dapat bekerjasama secara tim</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="5" <?php if ($q14 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="4" <?php if ($q14 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="3" <?php if ($q14 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="2" <?php if ($q14 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="1" <?php if ($q14 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Dapat menerima masukan /kritik untuk perbaikan</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q15" value="5" <?php if ($q15 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q15" value="4" <?php if ($q15 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q15" value="3" <?php if ($q15 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q15" value="2" <?php if ($q15 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q15" value="1" <?php if ($q15 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Adanya gagasan untuk/ide untuk perbaikan</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q16" value="5" <?php if ($q16 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q16" value="4" <?php if ($q16 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q16" value="3" <?php if ($q16 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q16" value="2" <?php if ($q16 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q16" value="1" <?php if ($q16 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
            </div>




            <div class="col-lg-6 mt-4">
                <h5 class="alert alert-info">D. Loyalitas</h5>
                <h5 class="mt-4">Mempunyai kesetiaan kepada institusi</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q17" value="5" <?php if ($q17 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q17" value="4" <?php if ($q17 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q17" value="3" <?php if ($q17 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q17" value="2" <?php if ($q17 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q17" value="1" <?php if ($q17 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Tidak menolak tugas yang diberikan</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q18" value="5" <?php if ($q18 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q18" value="4" <?php if ($q18 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q18" value="3" <?php if ($q18 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q18" value="2" <?php if ($q18 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q18" value="1" <?php if ($q18 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Mempunyai komitmen kuat untuk kemajuan institusi</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q19" value="5" <?php if ($q19 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q19" value="4" <?php if ($q19 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q19" value="3" <?php if ($q19 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q19" value="2" <?php if ($q19 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q19" value="1" <?php if ($q19 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Aktif di kegiatan/kepanitiaan di jurusan atau fakultas</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q20" value="5" <?php if ($q20 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q20" value="4" <?php if ($q20 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q20" value="3" <?php if ($q20 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q20" value="2" <?php if ($q20 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q20" value="1" <?php if ($q20 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>

            </div>






            <div class="col-lg-6 mt-4">
                <h5 class="alert alert-info">E. Kearsipan</h5>
                <h5 class="mt-4">Mengarsipkan/menempatkan berkas/alat sesuai dengan system pengarsipan/penyimpanan</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q21" value="5" <?php if ($q21 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q21" value="4" <?php if ($q21 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q21" value="3" <?php if ($q21 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q21" value="2" <?php if ($q21 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q21" value="1" <?php if ($q21 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Rapih</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q17" value="5" <?php if ($q17 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q22" value="4" <?php if ($q22 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q22" value="3" <?php if ($q22 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q22" value="2" <?php if ($q22 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q22" value="1" <?php if ($q22 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Bekerja secara efektif & efisien ATK</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q23" value="5" <?php if ($q23 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q23" value="4" <?php if ($q23 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q23" value="3" <?php if ($q23 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q23" value="3" <?php if ($q23 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q23" value="2" <?php if ($q23 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q23" value="1" <?php if ($q23 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>

                <h5 class="mt-4">Mudah dalam mencari arsip</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q24" value="5" <?php if ($q24 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q24" value="4" <?php if ($q24 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q24" value="3" <?php if ($q24 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q24" value="2" <?php if ($q24 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q24" value="1" <?php if ($q24 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>

            </div>
            <div class="col-lg-6 mt-4">
                <h5 class="alert alert-info">F. Pelayanan</h5>
                <h5 class="mt-4">Melayani mahasiswa dosen dan atasan dengan cepat, ramah, tepat</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q25" value="5" <?php if ($q25 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q25" value="4" <?php if ($q25 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q25" value="3" <?php if ($q25 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q25" value="2" <?php if ($q25 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q25" value="1" <?php if ($q25 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Tidak ada complain dari pengguna</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q26" value="5" <?php if ($q26 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q26" value="4" <?php if ($q26 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q26" value="3" <?php if ($q26 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q26" value="2" <?php if ($q26 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q26" value="1" <?php if ($q26 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Dapat bekerjasama dengan baik</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q27" value="5" <?php if ($q27 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q27" value="4" <?php if ($q27 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q27" value="3" <?php if ($q27 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q27" value="2" <?php if ($q27 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q27" value="1" <?php if ($q27 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">Dapat mudah ditemui/dihubungi</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q28" value="5" <?php if ($q28 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q28" value="4" <?php if ($q28 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q28" value="3" <?php if ($q28 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q28" value="2" <?php if ($q28 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q28" value="1" <?php if ($q28 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>
                <h5 class="mt-4">kompeten</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q29" value="5" <?php if ($q29 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q29" value="4" <?php if ($q29 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q29" value="3" <?php if ($q29 == 3) echo "checked"; ?>>
                    <label class="form-check-label">Cukup</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q29" value="2" <?php if ($q29 == 2) echo "checked"; ?>>
                    <label class="form-check-label">Kurang</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q29" value="1" <?php if ($q29 == 1) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Kurang</label>
                </div>

            </div>

        </div>






</div>
<div class="col-lg-6">

</div>
</div>

<div class="row justify-content-center m-5">
    <input type="submit" name="input" value="Input" class="btn btn-outline-primary">
</div>

</form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->