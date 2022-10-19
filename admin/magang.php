<?php
require_once '../template/header.php';
$get_id = "";
$first_open = null;
$magang = mysqli_query($conn, "SELECT * FROM tb_magang ORDER BY id DESC");
// $dataArray = array();

if (isset($_GET['selected_id'])) {
    $first_open = 0;
    $get_id = $_GET['selected_id'];
} else {
    // while ($flickrArray = mysqli_fetch_array($loker)) {
    //     $get_id = $flickrArray['id'];
    //     continue;
    // }
    $first_open = 1;
}



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

                    <h4 class="page-title">Magang</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Fitur</a>
                        </li>
                        <li class="active">
                            Data Magang
                        </li>
                    </ol>
                </div>
            </div>

            <!-- MODAL TABAH MAGANG -->
            <div id="con-close-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <h4 class="modal-title">Tambah Info Magang</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="controller/controller-magang.php" enctype="multipart/form-data">


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Judul Info Magang" name="judul" id="judul">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Instansi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Instansi" name="instansi" id="instansi">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"> Industri </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Mis : Akademik, Teknologi, Bisnis, Informasi.. " name="industri" id="industri">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                    <div class="col-sm-10">
                                        <!-- <div class="input-group"> -->
                                        <input type="date" class="form-control" required="" placeholder="mm/dd/yyyy" name="tanggal_magang" id="datepicker">
                                        <!-- <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Lokasi" name="lokasi" id="lokasi">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control autogrow" id="deskripsi" required name="deskripsi" placeholder="Deskripsi" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 104px; width: 558px;"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"> Link Info </label>
                                    <div class="col-sm-10">
                                        <input type="url" class="nb-edt form-control" required="" autocomplete="off" placeholder="Mis : https://uinamfind.com atau https://uin-alauddin.ac.id " name="link_info" id="link_info">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10 bootstrap-filestyle">
                                        <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto" id="foto" required>
                                        <div class="row text-info" id="viewProgress" hidden="">
                                            <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="admin_id" value="<?= $get_data_akun['id'] ?>">
                                    <?php
                                    if (isset($_SESSION['login_super'])) {
                                        echo "<input type='hidden' name='role_admin' value='Super'>";
                                    } else {
                                        echo "<input type='hidden' name='role_admin' value='Admin'>";
                                    }
                                    ?>
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="submit_tambah_magang" class="btn btn-default waves-effect">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AKHIR MODAL TABAH ADMIN -->

            <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah Info Magang</a>

            <div class="row">
                <div class="col-sm-4" style="overflow-y: scroll; max-height: 1000px;">
                    <!-- <div class=" card-box"> -->
                    <!-- <h4 class="m-t-0 header-title"><b>Info Magang</b></h4> -->

                    <?php
                    foreach ($magang as $dta) {
                        if ($first_open == 1) {
                            $get_id = $dta['id'];
                            $first_open = 0;
                        }
                        if ($get_id == $dta['id']) {
                            echo "<div class='card-box bg-inverse'>";
                        } else {
                            echo "<div class='card-box'>";
                        }
                    ?>

                        <a href="#">
                            <div class="media">
                                <div class="media-left">
                                    <a href="../assets/images/magang/<?= $dta['foto'] ?>" target="_blank"> <img class="media-object img-circle" alt="64x64" src="../assets/images/magang/<?= $dta['foto'] ?>" style="width: 64px; height: 64px;"> </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"> <a href="magang.php?selected_id=<?= $dta['id'] ?>"> <?= $dta['judul'] ?></a></h4>
                                    <p><i class="md md-business m-r-10"></i>
                                        <span><?= $dta['instansi'] ?></span>
                                    </p>
                                    <p>
                                        <span>Tanggal : <?= $dta['tanggal'] ?></span>
                                    </p>

                                    <p>
                                        <b>Lokasi:</b>
                                        <span class="text-muted"><?= $dta['lokasi'] ?></span>
                                    </p>
                                    <span class='label label-danger'> <?= $dta['industri'] ?> </span>
                                </div>
                            </div>
                        </a>
                </div>


            <?php
                    } ?>



            </div>
            <?php

            $result_selected = mysqli_query($conn, "SELECT * FROM tb_magang WHERE id = '$get_id'");
            $dta_selected = mysqli_fetch_assoc($result_selected);
            ?>
            <div class="col-sm-8">
                <div class="card-box">
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown"><i class="fa fa-cog"></i></button>
                        <ul class="dropdown-menu drop-menu-right" role="menu">
                            <li><a href="#" type="button" data-toggle="modal" data-target="#hapus-<?= $dta_selected['id'] ?>">Hapus</a></li>
                            <li><a href="#">Bagikan</a></li>
                        </ul>
                    </div>

                    <!-- MODAL HAPUS -->
                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta_selected['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content bg-inverse">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="color: white;">Hapus Data Beasiswa</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="color: white;">Yakin Ingin Menghapus Data Beasiswa ?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                    <a href="controller/controller-magang.php?hapus_magang=true&id=<?= $dta_selected['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <div class="product-right-info">
                        <h3><b><?= $dta_selected['judul'] ?></b></h3>
                        <?php
                        // $result_perusahaan_selected = mysqli_query($conn, "SELECT * FROM tb_perusahaan WHERE id = '$dta_selected[perusahaan_id]'");
                        // $dta_perusahaan_selected = mysqli_fetch_assoc($result_perusahaan_selected);
                        ?>
                        <p> <i class="md md-business m-r-10"></i> <?= $dta_selected['instansi'] ?></p>
                        <p> Lokasi : <?= $dta_selected['lokasi'] ?></p>
                        <p> Link : <a href="<?= $dta_selected['link_info'] ?>" target="_blank"> <?= $dta_selected['link_info'] ?> </a></p>

                        <p> Tanggal : <?= $dta_selected['tanggal'] ?></p>
                        <?php
                        if ($dta_selected['role_admin'] == "Super") {
                            $result_admin_selected = mysqli_query($conn, "SELECT * FROM tb_admin_super WHERE id = '$dta_selected[admin_id]'");
                            $dta_admin_selected = mysqli_fetch_assoc($result_admin_selected);
                            echo "<p> By : <a href='admin-super.php?id=$dta_admin_selected[id]'>$dta_admin_selected[nama]</a> </p>";
                        } else {
                            $result_admin_selected = mysqli_query($conn, "SELECT * FROM tb_admin_jurusan WHERE id = '$dta_selected[admin_id]'");
                            $dta_admin_selected = mysqli_fetch_assoc($result_admin_selected);
                            echo "<p> By : <a href='admin-jurusan.php?id=$dta_admin_selected[id]'>$dta_admin_selected[nama]</a> </p>";
                        }
                        ?>

                        <p>
                            <span class='label label-danger'> <?= $dta_selected['industri'] ?> </span>
                        </p>

                        <hr>
                        <h5 class="font-600">Deskripsi</h5>

                        <p class="text-muted"><?= $dta_selected['deskripsi'] ?></p>
                    </div>

                </div>
            </div>
        </div>




        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

        <?php
        require_once '../template/footer.php';
        ?>