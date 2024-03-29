<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <h5 class="mb-4 text-gray-800"><?= $title ?></h5>
    <hr>
    <h1 class="h3 mb-4 text-gray-800"><?= "Dosen FTUMJ"; ?></h1>

    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Jurusan</th>
                <th>Isi Kuesioner</th>
            </tr>
        </thead>
        <tbody>

            <?php

            foreach ($dosen as $row) {
                $num = $this->db->get_where('data_lppm', ['nip' => $this->session->userdata('nip'), 'id_dosen' => $row['id_dosen']])->row_array();
                //var_dump($num);
            ?>
                <tr>
                    <td><?= $row['nip']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jurusan']; ?></td>
                    <td>
                        <?php if ($num) { ?>
                            <a href="<?= base_url('lppm/data_jurnal/') . $row['id_dosen']; ?>" class="btn btn-success">Valued</a>
                        <?php } else { ?>
                            <a href="<?= base_url('lppm/data_jurnal/') . $row['id_dosen']; ?>" class="btn btn-warning">Isi</a>
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