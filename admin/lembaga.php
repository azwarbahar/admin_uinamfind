<?php
require_once '../template/header.php';
$lembaga = mysqli_query($conn, "SELECT * FROM tb_lembaga_kampus ");
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <h4 class="page-title">Data Lembaga</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li class="active">
                            Data Lembaga
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">


                        <!-- MODAL TABAH LEMBAGA -->
                        <div id="con-close-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Lembaga</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-lembaga.php" enctype="multipart/form-data">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Lembaga</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lembaga" name="nama" id="nama">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cakupan Lembaga</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="cakupan" id="cakupan" required>
                                                        <option value="">- Pilih -</option>
                                                        <option value="Univarsitas">Univarsitas</option>
                                                        <option value="Fakultas">Fakultas</option>
                                                        <option value="Jurusan">Jurusan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row" hidden id="continer_fakultas">
                                                <label class="col-sm-2 col-form-label">Fakultas</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="fakultas" id="fakultas">
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $fakultas = mysqli_query($conn, "SELECT * FROM tb_fakultas");
                                                        while ($row = mysqli_fetch_assoc($fakultas)) {
                                                            echo "<option value='$row[nama]'>$row[nama]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row" hidden id="continer_jurusan">
                                                <label class="col-sm-2 col-form-label">Jurusan</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="jurusan" id="jurusan">
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $fakultas = mysqli_query($conn, "SELECT * FROM tb_fakultas");
                                                        while ($row = mysqli_fetch_assoc($fakultas)) {
                                                        ?>
                                                            <optgroup label="<?= $row['nama'] ?>">
                                                                <?php
                                                                $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE fakultas = '$row[nama]' ");
                                                                while ($row_jurusan = mysqli_fetch_assoc($jurusan)) {
                                                                ?>
                                                                    <option value="<?= $row_jurusan['jurusan'] ?>"><?= $row_jurusan['jurusan'] ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Tahun Berdiri" name="tahun_berdiri" id="tahun_berdiri">
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="status" id="status" required="">
                                                        <option value=""> - Pilih -</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control autogrow" id="deskripsi" name="deskripsi" placeholder="Deskripsi" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 104px; width: 558px;"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="continer_fakultas">
                                                <label class="col-sm-2 col-form-label">Admin</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="admin" id="admin" required>
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user WHERE status_akun = 'Active'");
                                                        while ($row = mysqli_fetch_assoc($mahasiswa)) {
                                                            echo "<option value='$row[id]'>$row[nama_depan] $row[nama_belakang] - ($row[nim])</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Foto</label>
                                                <div class="col-sm-10 bootstrap-filestyle">
                                                    <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto" id="foto">
                                                    <div class="row text-info" id="viewProgress" hidden="">
                                                        <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="modal-footer">
                                                <!-- <input type="hidden" name="id_mitra" value="<?= $get_id_session ?>"> -->
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_lembaga" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH ADMIN -->


                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah</a>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Jurusan</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($lembaga as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="https://api.uinamfind.com//upload/photo/<?= $dta['foto'] ?>" alt="<?= $dta['nama'] ?>" class="img-circle  thumb-sm ">
                                        </td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><?= $dta['fakultas'] ?></td>
                                        <td><?= $dta['jurusan'] ?></td>
                                        <?php
                                        $result_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta[admin]'");
                                        $dta_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
                                        ?>
                                        <td> <a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa['id'] ?>"> <?= $dta_mahasiswa['nama_depan'] ?> </a> </td>
                                        <?php
                                        $status = $dta['status'];
                                        if ($status == "Active") {
                                            echo "<td><span class='label label-default'> Aktif </span></td>";
                                        } else {
                                            echo "<td><span class='label label-danger'> Non Aktif </span></td>";
                                        }
                                        ?>
                                        <td style="text-align: center;">
                                            <a href="lembaga-detail.php?id=<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
                                        </td>
                                    </tr>
                                <?php $i = $i + 1;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>