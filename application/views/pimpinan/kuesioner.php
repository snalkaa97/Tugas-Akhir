<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message'); ?>
    <form action="">
        <h5>Kehadiran</h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q1" value="1">
            <label class="form-check-label">Sangat Baik</label>
        </div>
        <div class=" form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q1" value="2">
            <label class="form-check-label">Baik</label>
        </div>
        <div class=" form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q1" value="3">
            <label class="form-check-label">Cukup</label>
        </div>
        <div class=" form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q1" value="4">
            <label class="form-check-label">Kurang</label>
        </div>
        <div class=" form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q1" value="5">
            <label class="form-check-label">Sangat Kurang</label>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->