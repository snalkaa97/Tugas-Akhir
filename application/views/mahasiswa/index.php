<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg-6">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>Isi Kuesioner</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($dosen as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><a class="badge badge-success" href="<?= base_url('mahasiswa/kuesioner'); ?>">Isi</a></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->