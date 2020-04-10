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
        //var_dump($num);
        if ($num > 0) {
            $q1 = $num['q1'];
            $q2 = $num['q2'];
            $q3 = $num['q3'];
            $q4 = $num['q4'];
            $q5 = $num['q5'];
        }

        ?>
        <h5>Kehadiran</h5>
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
        <h5 class="mt-4">Kedisiplinan</h5>
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
        <h5 class="mt-4">Penguasaan Materi</h5>
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
        <h5 class="mt-4">Pelaksanaan Praktikum</h5>
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
        <h5 class="mt-4">Penguasaan Kelas</h5>
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
        <div class="mt-4">
            <input type="submit" name="input" value="Input" class="btn btn-outline-primary">
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->