<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-6">
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($kriteria as $k) : ?>
                        <tr>
                            <th><?= $i ?></th>
                            <td><?= $k['nama_kriteria']; ?></td>
                            <td><?= $k['bobot']; ?></td>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <h1 class="h3 mb-4 text-gray-800">Himpunan Kriteria</h1>
            <div class="center">
                <form action="<?= base_url('admin/dataKriteria_tendik'); ?>" method="get">
                    <div class="form-group">
                        <select name="nama_kriteria" id="" class="form-control">
                            <option value="">-- Pilih Kriteria--</option>
                            <?php foreach ($kriteria as $k) : ?>
                                <option value="<?= $k['nama_kriteria'] ?>"><?= $k['nama_kriteria']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Pilih" class="btn btn-primary" name="pilih">
                    </div>
                </form>
            </div>
            <?php if (isset($_GET['pilih'])) : ?>
                <h6 class="mb-4 alert alert-primary"><?= $_GET['nama_kriteria']; ?></h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Himpunan</th>
                            <th>Keterangan</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        <?php foreach ($himpunan as $h) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $h['himpunan']; ?></td>
                                <td><?= $h['keterangan']; ?></td>
                                <td><?= $h['nilai']; ?></td>
                            <?php $i++;
                        endforeach; ?>
                            </tr>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>