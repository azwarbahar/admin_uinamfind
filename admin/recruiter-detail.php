<?php
require_once '../template/header.php';

$recruiter_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_recruiter WHERE id = '$recruiter_id'");
$dta = mysqli_fetch_assoc($result);

$result_perusahaan = mysqli_query($conn, "SELECT * FROM tb_perusahaan WHERE id = '$dta[id_perusahaan]'");
$dta_perusahaan = mysqli_fetch_assoc($result_perusahaan);

$loker = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan WHERE recruiter_id = '$recruiter_id'");

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
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                        <ul class="dropdown-menu drop-menu-right" role="menu">
                            <li><a href="#">Bagikan</a></li>
                            <li class="divider"></li>
                            <?php

                            $status_akun = $dta['status'];
                            if ($status_akun == "Banned") {
                                echo "<li><a href='' data-toggle='modal' data-target='.banned-mahasiswa'>Buka Banned</a></li>";
                            } else {
                                echo "<li><a style='color: #E60013 ;' href='' data-toggle='modal' data-target='.banned-mahasiswa'>Banned Akun</a></li>";
                            }

                            ?>

                        </ul>
                    </div>

                    <h4 class="page-title">Data Recruiter</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li>
                            <a href="recruiter.php">Data Recruiter</a>
                        <li class="active">
                            Detail
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="contact-card">
                            <a class="pull-left" href="#">
                                <img class="img-circle" src="../assets/images/users/avatar-6.jpg" alt="">
                            </a>
                            <div class="member-info" style="padding-bottom: 0px" ;>
                                <h4 class="m-t-0 m-b-5 header-title"><b><?= $dta['nama'] ?></b></h4>
                                <p class="text-muted"><?= $dta['motto'] ?></p>
                                <p class="text-dark"><i class="md md-business m-r-10"></i><small><?= $dta['nama_perusahaan'] ?></small></p>
                                <!-- <div class="m-t-20">
                                    <a href="#" class="btn btn-purple waves-effect waves-light btn-sm">Send email</a>
                                    <a href="#" class="btn btn-success waves-effect waves-light btn-sm m-l-5">Edit</a>
                                    <a href="#" class="btn btn-pink waves-effect waves-light btn-sm m-l-5">Call</a>
                                </div> -->

                                <p class="text-muted"><?= $dta['lokasi'] ?> - Indonesia</p>
                            </div>

                        </div>
                    </div>


                    <div class="card-box">
                        <h4 class="m-t-0 m-b-20 header-title"><b>Perusahaan <span class="text-muted"></span></b></h4>

                        <div class="text-left">
                            <p class="text-muted font-13"><strong>Name :</strong> <a href="perusahaan-detail.php?id=<?= $dta_perusahaan['id'] ?>"> <span class="m-l-15"><?= $dta_perusahaan['nama'] ?></span></a></p>

                            <p class="text-muted font-13"><strong>Industri :</strong><span class="m-l-15"><?= $dta_perusahaan['industri'] ?></span></p>

                            <p class="text-muted font-13"><strong>Kontak :</strong> <span class="m-l-15"><?= $dta_perusahaan['telpon'] ?></span></p>

                            <p class="text-muted font-13"><strong>Lokasi :</strong> <span class="m-l-15"><?= $dta_perusahaan['lokasi'] ?> - Indonesia</span></p>

                        </div>


                    </div>
                </div>

                <div class="col-sm-8">

                    <div class="portlet">
                        <div class="portlet-heading portlet-default">
                            <h3 class="portlet-title text-dark">
                                Postingan Lowongan Kerja
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-loker"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <br>
                        <div id="bg-post-loker" class="panel-collapse collapse in">
                            <div class="portlet-body">

                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Posisi</th>
                                            <th>Peusahaan</th>
                                            <th>Jenis</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal</th>
                                            <th>Gaji</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($loker as $dta_loker) { ?>
                                            <tr>
                                                <td><?= $dta_loker['posisi'] ?></td>
                                                <td><?= $dta_loker['perusahaan'] ?></td>
                                                <td><?= $dta_loker['jenis_pekerjaan'] ?></td>
                                                <td><?= $dta_loker['lokasi'] ?></td>
                                                <td><?= $dta_loker['created_at'] ?></td>
                                                <td><?= $dta_loker['gaji_min'] ?> - <?= $dta_loker['gaji_max'] ?></td>
                                                <td style="text-align: center;">
                                                    <a href="loker-detail.php?id=<?= $dta_loker['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
                                                </td>
                                            </tr>

                                        <?php $i = $i + 1;
                                        } ?>

                                    </tbody>
                                </table>

                            </div>
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