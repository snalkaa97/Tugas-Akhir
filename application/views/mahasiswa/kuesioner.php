<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <h5 class="alert alert-primary"><?= $dosen['nama']; ?></h5>
    <form action="<?= base_url('mahasiswa/input_nilai'); ?>" method="post">
        <input type="hidden" value="<?= $dosen['id_dosen'] ?>" name="id_dosen">
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
        }

        ?>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="alert alert-info">A. Kesiapan Mengajar</h5>
                <h5>Dosen datang tepat pada waktu sesuai jadwal</h5>
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
                <h5 class="mt-4">Dosen menjelaskan tentang Rencana Pembelajaran Semester (RPS)</h5>
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
                <h5 class="mt-4">Dosen memiliki bahan ajar</h5>
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
                <h5 class="mt-4">Dosen menggunakan rujukan / referensi pembelajaran </h5>
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




                <h5 class="alert alert-info mt-5">C. Kepribadaian</h5>
                <h5>Dosen memiliki suara yang jelas</h5>
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
                <h5 class="mt-4">Dosen mampu menjaga wibawa pribadi</h5>
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
                <h5 class="mt-4">Dosen berpenampilan rapi dan bisa menjadi panutan</h5>
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
                <h5 class="mt-4">Dosen mampu mengendalikan diri dalam berbagai situasi dan kondisi</h5>
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
                <h5 class="mt-4">Dosen mudah menjalin komunikasi dengan mahasiswa</h5>
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
            <div class="col-lg-6">
                <h5 class="alert alert-info">B. Proses Pembelajaran</h5>
                <h5>Dosen menjelaskan materi sesuai RPS</h5>
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
                <h5 class="mt-4">Dosen menjelaskan materi kuliah dengan mudah dimengerti</h5>
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
                <h5 class="mt-4">Dosen menggunakan metode pembelajaran yang bervariasi</h5>
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
                <h5 class="mt-4">Dosen memotifasi mahasiswa untuk belajar dan memacu partisipasi kelas </h5>
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
                <h5 class="mt-4">Dosen mampu menegakkan disiplin di kelas</h5>
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
                <h5 class="mt-4">Dosen memberikan tanggapan atas pertanyaan mahasiswa</h5>
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
                <h5 class="mt-4">Dosen memberikan tugas kepada mahasiswa yang relevan dengan materi ajar</h5>
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
                <h5 class="mt-4">Dosen menyediakan waktu untuk diskusi</h5>
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
                <h5 class="mt-4">Dosen memiliki kemampuan memberikan contoh / kasus sesuai dengan materi ajar</h5>
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
                <h5 class="mt-4">Dosen membuat soal sesuai dengan RPS</h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="5" <?php if ($q14 == 5) echo "checked"; ?>>
                    <label class="form-check-label">Sangat Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="4" <?php if ($q14 == 4) echo "checked"; ?>>
                    <label class="form-check-label">Baik</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q14" value="3" <?php if ($q14 == 3) echo "checked"; ?> required>
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
                <h5 class="mt-4">Dosen memberikan nilai secara obyektif</h5>
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