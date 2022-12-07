<?php
require_once '../template/header.php';
$perusahaan = mysqli_query($conn, "SELECT * FROM tb_perusahaan");
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

                    <h4 class="page-title">Data Perusahaan</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li class="active">
                            Data Perusahaan
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
                                        <h4 class="modal-title">Tambah Perusahaan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-perusahaan.php" enctype="multipart/form-data">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Perusahaan" name="nama" id="nama">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"> Industri </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Mis : Akademik, Teknologi, Bisnis, Informasi.. " name="industri" id="industri">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Jumlah Pegawai</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="ukuran_kariawan" id="ukuran_kariawan" required="">
                                                        <option value=""> - Pilih -</option>
                                                        <option value="0-10">0-10 Orang Pegawai</option>
                                                        <option value="10-100">10-100 Orang Pegawai</option>
                                                        <option value="100-500">100-500 Orang Pegawai</option>
                                                        <option value="500-1000">500-1000 Orang Pegawai</option>
                                                        <option value="1000 >">1000 > Orang Pegawai</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control autogrow" id="deskripsi" name="deskripsi" placeholder="Deskripsi (Opsional)" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 104px; width: 558px;"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"> Website Perusahaan </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Mis : https://uinamfind.com atau uin-alauddin.ac.id " name="url_profil" id="url_profil">
                                                </div>
                                            </div>

                                            <div class="form-group row" id="continer_fakultas">
                                                <label class="col-sm-2 col-form-label">Admin</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="admin" id="admin" required>
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $recruiter = mysqli_query($conn, "SELECT * FROM tb_recruiter");
                                                        while ($row = mysqli_fetch_assoc($recruiter)) {
                                                            echo "<option value='$row[id]'>$row[nama]</option>";
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
                                                <button type="submit" name="submit_tambah_perusahaan" class="btn btn-default waves-effect">Simpan</button>
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
                                    <th>Industri</th>
                                    <th>Jumlah Kariawan</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($perusahaan as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="https://api.uinamfind.com/upload/perusahaan/<?= $dta['foto'] ?>" alt="<?= $dta['nama'] ?>" class="img-circle  thumb-sm ">
                                        </td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td> <a href="#"> <?= $dta['industri'] ?> </a> </td>
                                        <td><?= $dta['ukuran_kariawan'] ?> Pegawai</td>
                                        <?php
                                        $result_recruiter = mysqli_query($conn, "SELECT * FROM tb_recruiter WHERE id = '$dta[recruiter_id]'");
                                        $dta_recruiter = mysqli_fetch_assoc($result_recruiter);
                                        ?>
                                        <td> <a href="recruiter-detail.php?id=<?= $dta_recruiter['id'] ?>"> <?= $dta_recruiter['nama'] ?> </a> </td>
                                        <?php
                                        $status = $dta['status'];
                                        if ($status == "Active") {
                                            echo "<td><span class='label label-default'> Aktif </span></td>";
                                        } else {
                                            echo "<td><span class='label label-danger'> Non Aktif </span></td>";
                                        }
                                        ?>
                                        <td style="text-align: center;">
                                            <a href="perusahaan-detail.php?id=<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
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