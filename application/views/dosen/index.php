<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <h5 class="mb-4 text-gray-800"><?= $title ?></h5>
    <hr>
    <h1 class="h3 mb-4 text-gray-800"><?= $user['jurusan']; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Isi Kuesioner</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // $db = "tugas-akhir";
            // $koneksi = mysqli_connect("localhost", "root", "", $db);
            // $sql = "SELECT * from dosen_peserta WHERE jurusan ='$user[jurusan]'";
            // $query = mysqli_query($koneksi, $sql);
            // $nip = $user['nip'];
            // $id_dosen = $user['id_dosen'];
            // //var_dump($id_dosen);
            // while ($row = mysqli_fetch_array($query)) {
            //     $cek = mysqli_query($koneksi, "SELECT * from nilai_dosen where nip='$nip' and id_dosen='$row[id_dosen]'");
            //     $num = mysqli_num_rows($cek);
            foreach ($dosen as $row) {
                $num = $this->db->get_where('nilai_dosen', ['nip' => $this->session->userdata('nip'), 'id_dosen' => $row['id_dosen']])->row_array();
                //var_dump($num);
            ?>
                <tr>
                    <td><?= $row['nip']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td>
                        <?php if ($num) { ?>
                            <a href="<?= base_url('dosen/kuesioner/') . $row['id_dosen']; ?>" class="btn btn-success">Valued</a>
                        <?php } else { ?>
                            <a href="<?= base_url('dosen/kuesioner/') . $row['id_dosen']; ?>" class="btn btn-warning">Isi</a>
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