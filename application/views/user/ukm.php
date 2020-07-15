<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <div class="row">
                <div class="col-sm-3">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <?php if (empty($ukm)) : ?>
                        <a class="btn btn-primary mb-3" data-toggle="modal" data-target="#addukm" href="">Tambah UKM user</a>
                    <?php endif; ?>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($ukm as $d) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $d['nip']; ?></td>
                                <td><?= $d['nama']; ?></td>
                                <td><a class="badge badge-success" data-toggle="modal" data-target="#editukm<?= $d['nip'] ?>" href="#">edit</a>
                                    <a class="badge badge-danger" data-toggle="modal" data-target="#hapusukm<?= $d['nip']; ?>" href="#">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="modal fade" id="addukm" tabindex="-1" role="dialog" aria-labelledby="addukmLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addukmLabel">Tambah UKM User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tambahukm'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="nip">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->



    <!-- Modal -->

    <?php foreach ($ukm as $d) : ?>
        <div class="modal fade" id="hapusukm<?= $d['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusukmLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusukmLabel">Hapus UKM User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/hapusukm/' . $d['nip']); ?>" method="get">
                        <div class="modal-body">
                            Are You Sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php foreach ($ukm as $d) : ?>
        <div class="modal fade" id="editukm<?= $d['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="editukmLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editukmLabel">Edit UKM Peserta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/editukm/' . $d['nip']); ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="nip" value="<?= $d['nip']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="nip" value="<?= $d['nip']; ?>">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama']; ?>" placeholder="Nama">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    <?php endforeach; ?>