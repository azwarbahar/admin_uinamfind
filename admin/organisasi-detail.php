<?php
require_once '../template/header.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_organisasi WHERE id = '$id'");
$dta = mysqli_fetch_assoc($result);

// $result_perusahaan = mysqli_query($conn, "SELECT * FROM tb_perusahaan WHERE id = '$dta[id_perusahaan]'");
// $dta_perusahaan = mysqli_fetch_assoc($result_perusahaan);

// $loker = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan WHERE recruiter_id = '$recruiter_id'");

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

                    <h4 class="page-title">Organisasi dan Komunitas</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li>
                            <a href="organisasi.php">Data Organisasi dan Komunitas</a>
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
                                <img class="img-circle thumb-md" src="https://api.uinamfind.com/upload/photo/<?= $dta['foto'] ?>" alt="<?= $dta['nama_organisasi'] ?>">
                            </a>
                            <div class="member-info" style="padding-bottom: 0px" ;>
                                <h4 class="m-t-0 m-b-5 header-title"><b><?= $dta['nama_organisasi'] ?></b></h4>
                                <p class="text-dark"><i class="md md-people m-r-10"></i><small><a href=""><?= $dta['kategori'] ?></a></small></p>

                                <!-- <p class="text-dark"><i class="md md-business m-r-10"></i><small></small></p> -->
                                <!-- <div class="m-t-20">
                                    <a href="#" class="btn btn-purple waves-effect waves-light btn-sm">Send email</a>
                                    <a href="#" class="btn btn-success waves-effect waves-light btn-sm m-l-5">Edit</a>
                                    <a href="#" class="btn btn-pink waves-effect waves-light btn-sm m-l-5">Call</a>
                                </div> -->

                                <p class="text-muted">Tahun Berdiri : <?= $dta['tahun_berdiri'] ?></p>
                            </div>

                            <!-- <p style="margin-top:20px ;"></p> -->
                        </div>
                    </div>

                    <div class="card-box">
                        <h4 class="m-t-0 m-b-20 header-title"><b>Info <span class="text-muted"></span></b></h4>

                        <div class="text-left">
                            <?php
                            $result_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta[admin]'");
                            $dta_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
                            ?>
                            <p class="text-muted font-13"><strong>Admin :</strong><a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa['id'] ?>"><span class="m-l-15"><?= $dta_mahasiswa['nama_depan'] ?> <?= $dta_mahasiswa['nama_belakang'] ?></span></a></p>
                            <p class="text-muted font-13"><strong>Bidang :</strong><a href="#"><span class="m-l-15"><?= $dta['kategori'] ?></span></a></p>
                            <p class="text-muted font-13"><strong>Kontak :</strong><span class="m-l-15"><?= $dta['kontak'] ?></span></p>
                            <p class="text-muted font-13"><strong>Email :</strong><span class="m-l-15"><?= $dta['email'] ?></span></p>
                            <p class="text-muted font-13"><strong>Alamat :</strong><span class="m-l-15"><?= $dta['alamat'] ?></span></p>

                            <p class="text-muted font-13"><strong style="font-size: 18px ;">Deskripsi :</strong><br><?= $dta['deskripsi'] ?> </p>

                            <div class="button-list m-t-20">
                                <?php

                                $sosmed = mysqli_query($conn, "SELECT * FROM tb_sosmed WHERE kategori = 'Organisasi' AND from_id = '$dta[id]'");

                                foreach ($sosmed as $dta_get_sosmed) {
                                    $nama_sosmed = $dta_get_sosmed['nama_sosmed'];
                                    if ($nama_sosmed == "Facebook") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-facebook waves-effect waves-light'>
                                                    <i class='fa fa-facebook'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Instagram") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-dribbble  waves-effect waves-light'>
                                                    <i class='fa fa-instagram'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Whatsapp") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-success waves-effect waves-light'>
                                                    <i class='fa fa-whatsapp'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Twitter") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-twitter waves-effect waves-light'>
                                                    <i class='fa fa-twitter'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "TikTok") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-flickr waves-effect waves-light'>
                                                    <i class='fa-brands fa-tiktok'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Youtube") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-youtube waves-effect waves-light'>
                                                    <i class='fa fa-youtube'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Linkedin") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-linkedin waves-effect waves-light'>
                                                    <i class='fa fa-linkedin'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Github") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-github waves-effect waves-light'>
                                                    <i class='fa fa-github'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Telegram") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-telegram waves-effect waves-light'>
                                                    <i class='fa fa-telegram'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Pinterest") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-pinterest waves-effect waves-light'>
                                                    <i class='fa fa-pinterest'></i>
                                                </a>";
                                    } else if ($nama_sosmed == "Website") {
                                        echo "<a href='$dta_get_sosmed[url_sosmed]' target='_blank' class='btn btn-warning waves-effect waves-light'>
                                                    <i class='fa fa-chrome'></i>
                                                </a>";
                                    }
                                ?>

                                <?php

                                }
                                ?>

                            </div>

                        </div>


                    </div>
                    <div class="card-box">
                        <?php
                        $get_anggota = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE from_id = '$dta[id]' AND kategori='Organisasi'");
                        $row_get_anggota = mysqli_num_rows($get_anggota);
                        $row_get_anggota_final = $row_get_anggota;
                        ?>

                        <h4 class="m-t-0 m-b-20 header-title"><b>Anggota <span class="text-muted">(<?= $row_get_anggota_final ?>)</span></b></h4>

                        <div class="friend-list">
                            <?php
                            foreach ($get_anggota as $dta_get_anggota) {
                                $result_mahasiswa_anggota = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta_get_anggota[user_id]'");
                                $dta_mahasiswa_anggota = mysqli_fetch_assoc($result_mahasiswa_anggota);
                            ?>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= $dta_mahasiswa_anggota['nama_depan'] . ' ' . $dta_mahasiswa_anggota['nama_belakang'] ?>">
                                    <img src="../assets/images/users/avatar-1.jpg" class="img-circle thumb-md" alt="friend">
                                </a>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="portlet">
                        <div class="portlet-heading portlet-default">
                            <h3 class="portlet-title text-dark">
                                Galeri
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
                        <!-- <br> -->
                        <div id="bg-post-loker" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="owl-carousel owl-theme" id="owl-multi">

                                    <?php
                                    $get_foto = mysqli_query($conn, "SELECT * FROM tb_foto WHERE from_id = '$dta[id]' AND kategori='Organisasi'");
                                    foreach ($get_foto as $dta_get_foto) {
                                    ?>
                                        <!-- loop this -->
                                        <div class="item"> <a href="../assets/images/gallery/1.jpg" target="_blank">
                                                <img src="../assets/images/gallery/1.jpg" />
                                            </a>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="portlet">
                        <div class="portlet-heading portlet-default">
                            <h3 class="portlet-title text-dark">
                                Aktivitas Organisasi
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
                        <!-- <br> -->
                        <div id="bg-post-loker" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">

                                    <?php
                                    $get_kegiatan = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE from_id = '$dta[id]' AND kategori='Organisasi'");
                                    foreach ($get_kegiatan as $dta_get_kegiatan) {
                                    ?>
                                        <!-- blog content -->
                                        <div class="col-lg-6">
                                            <div class="blog-box-one">
                                                <div class="cover-wrapper">
                                                    <a href="#"><img alt="Blog-img" src="../assets/images/blogs/5.jpg" class="img-responsive" /></a>
                                                </div>
                                                <div class="post-info">

                                                    <?php

                                                    $getDate = $dta_get_kegiatan['tanggal'];
                                                    $hari = date("d", strtotime($getDate));
                                                    $bulan = date("M", strtotime($getDate));

                                                    ?>
                                                    <div class="date">
                                                        <span class="day"><?= $hari ?></span><br>
                                                        <span class="month"><?= $bulan ?></span>
                                                    </div>

                                                    <div class="meta-container">
                                                        <a href="#">
                                                            <h4 class="text-overflow m-t-0"><?= $dta_get_kegiatan['nama'] ?></h4>
                                                        </a>
                                                        <div class="font-13">
                                                            <span class="meta">Tempat : <b><?= $dta_get_kegiatan['tempat'] ?></b></span>
                                                        </div>
                                                    </div>

                                                    <p class="text-muted m-b-0" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;">
                                                        <?= $dta_get_kegiatan['deskripsi'] ?>
                                                    </p>

                                                    <div class="row m-t-10">
                                                        <!-- <div class="col-xs-6">
                                                        <div class="m-t-10 blog-widget-action">
                                                            <a href="javascript:void(0)">
                                                                <i class="mdi md-favorite"></i> <span>54</span>
                                                            </a>
                                                            <a href="javascript:void(0)">
                                                                <i class="mdi md-comment"></i> <span>26</span>
                                                            </a>
                                                        </div>
                                                    </div> -->
                                                        <div class="col-xs-12 text-right">
                                                            <a href="#" class="btn btn-sm waves-effect btn-white">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div><!-- end blog -->

                                    <?php
                                    }
                                    ?>


                                </div>
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