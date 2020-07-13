<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tendik</th>
                <th>Jurusan</th>
                <th>Isi Kuesioner</th>
            </tr>
        </thead>
        <tbody>

            <?php
            //var_dump($user['tendik']);
            $db = "tugas-akhir";
            $koneksi = mysqli_connect("localhost", "root", "", $db);
            $sql = "SELECT * from tendik_peserta WHERE jurusan ='$user[jurusan]' AND tendik = '$user[tendik]'";
            $query = mysqli_query($koneksi, $sql);
            $nip = $user['nip'];
            $id_tendik = $user['id_tendik'];
            //var_dump($id_dosen);
            while ($row = mysqli_fetch_array($query)) {
                $cek = mysqli_query($koneksi, "SELECT * from nilai_pimpinan_tendik where nip='$nip' and id_tendik='$row[id_tendik]'");
                $num = mysqli_num_rows($cek);
            ?>
                <tr>
                    <td><?= $row['nip']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['tendik']; ?></td>
                    <td><?= $row['jurusan']; ?></td>
                    <td>
                        <?php if ($num > 0) { ?>
                            <a href="<?= base_url('tendik/kuesioner/') . $row['id_tendik']; ?>" class="btn btn-success">Valued</a>
                        <?php } else { ?>
                            <a href="<?= base_url('tendik/kuesioner/') . $row['id_tendik']; ?>" class="btn btn-warning">Isi</a>
                        <?php } ?>
                    </td>
                <?php } ?>

                </tr>
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->