<?php
require_once '../template/header.php';
$ukm = mysqli_query($conn, "SELECT * FROM tb_ukm");
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

                    <h4 class="page-title">Data UKM</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li class="active">
                            Data UKM
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
                                        <h4 class="modal-title">Tambah UKM</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-ukm.php" enctype="multipart/form-data">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama UKM</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama UKM" name="nama" id="nama">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"> Bidang </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Mis : Akademik, Seni, Oalhraga, IT " name="kategori" id="kategori">
                                                </div>
                                            </div>

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
                                                        $mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user");
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
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_ukm" class="btn btn-default waves-effect">Simpan</button>
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
                                    <th>Kategori</th>
                                    <th>Tahun Berdiri</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($ukm as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="https://api.uinamfind.com/upload/photo/<?= $dta['foto'] ?>" alt="<?= $dta['nama_ukm'] ?>" class="img-circle  thumb-sm ">
                                        </td>
                                        <td><?= $dta['nama_ukm'] ?></td>
                                        <td> <a href="#"> <?= $dta['kategori'] ?> </a> </td>
                                        <td><?= $dta['tahun_berdiri'] ?></td>
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
                                            <a href="ukm-detail.php?id=<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
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