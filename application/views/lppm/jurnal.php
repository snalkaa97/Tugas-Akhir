<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <h5 class="alert alert-primary"><?= $dosen['nama']; ?></h5>
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <?= $this->session->flashdata('message'); ?>
                <h3>Kualifikasi Penelitian Dosen</h3>
                <hr>
                <form role="form" action="<?= base_url('lppm/input_nilai') ?>" method="post">
                    <?php

                    if ($num > 0) {
                        $tmp_pn = $num['jml_pn'];
                        $tmp_jia = $num['jml_jia'];
                        $tmp_ji = $num['jml_ji'];
                        $tmp_jna = $num['jml_jna'];
                        $tmp_jn = $num['jml_jn'];
                        $tmp_jl = $num['jml_jl'];
                        $tmp_pl = $num['jml_pl'];
                        $tmp_sm = $num['jml_sm'];
                        $tmp_pg = $num['jml_pg'];
                    } else {
                        $tmp_pn = "";
                        $tmp_jia = "";
                        $tmp_ji = "";
                        $tmp_jna = "";
                        $tmp_jn = "";
                        $tmp_jl = "";
                        $tmp_pl = "";
                        $tmp_sm = "";
                        $tmp_pg = "";
                    } ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="NameInputEmail1" placeholder="Username" name="id_dosen" value="<?php echo $dosen['id_dosen']; ?>" readonly="true">
                    </div>


                    <div class="form-group">
                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jumlah Penelitian</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_pn" placeholder="* Jumlah penelitan" <?php echo "value='$tmp_pn'"; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jurnal Internasional Akreditasi</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_jia" placeholder="** Jumlah jurnal internasional akreditasi" <?php echo "value='$tmp_jia'"; ?>>
                        </div>

                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jurnal Internasional</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_ji" placeholder="** Jumlah jurnal internasional" <?php echo "value='$tmp_ji'"; ?>>
                        </div>

                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jurnal Nasional Akreditasi</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_jna" placeholder="** Jumlah jurnal nasional akreditasi" <?php echo "value='$tmp_jna'"; ?>>
                        </div>

                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jurnal Nasional</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_jn" placeholder="** Jumlah jurnal nasional" <?php echo "value='$tmp_jn'"; ?>>
                        </div>

                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jurnal Lokal</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_jl" placeholder="** Jumlah jurnal lokal" <?php echo "value='$tmp_jl'"; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jumlah Pelatihan</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_pl" placeholder="* Jumlah pelatihan" <?php echo "value='$tmp_pl'"; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jumlah Seminar</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_sm" placeholder="* Jumlah seminar" <?php echo "value='$tmp_sm'"; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lb col-lg-offset-0">
                            <label class="pull-left">Jumlah Pengabdian Masyarakat</label>
                        </div>
                        <div class="col-fr col-lg-offset-6">
                            <input class="form-control" type="text" name="jml_pg" placeholder="* Jumlah pengabdian masyarakat" <?php echo "value='$tmp_pg'"; ?>>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="Submit">
                </form>
                <br>
                <table>
                    <tr>
                        <td align="left"><i>Note :</i></td>
                        <td align="left"><i>Form dengan tanda * harus diisi, apabila inputan kosong isi dengan 0</i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left"><i>Form dengan tanda ** harus diisi salah satunya</i></td>
                    </tr></i>
                </table>
            </div>
        </div>
    </div>
</div>