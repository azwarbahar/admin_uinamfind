<?php
require_once '../template/header.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_lembaga_kampus WHERE id = '$id'");
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

                    <h4 class="page-title">Lembaga Kampus</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li>
                            <a href="lembaga.php">Data Lembaga Kampus</a>
                        <li class="active">
                            Detail
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-6">
                    <!-- blog content -->
                    <div class="blog-box-one">
                        <div class="cover-wrapper">
                            <a href="#"><img alt="Blog-img" src="../assets/images/blogs/5.jpg" class="img-responsive" /></a>
                        </div>
                        <div class="post-info">
                            <div class="date">
                                <span class="day">16</span><br>
                                <span class="month">Mar</span>
                            </div>

                            <div class="meta-container">
                                <a href="#">
                                    <h4 class="text-overflow m-t-0">Beautiful Image Blog Post</h4>
                                </a>
                                <div class="font-13">
                                    <span class="meta">Posted by James in <a href="#"><b>Web Design</b></a></span>
                                </div>
                            </div>

                            <p class="text-muted m-b-0">
                                Nunc nec dui vitae urna cursus lacinia. In
                                venenatis eget justo in dictum. Vestibulum
                                auctor raesent quisnm.Lorem Ipsum is simply dummy text
                                of the printing and typesetting industry. Simply dummy
                                text of the printing and typesetting.
                            </p>

                            <div class="row m-t-10">
                                <div class="col-xs-6">
                                    <div class="m-t-10 blog-widget-action">
                                        <a href="javascript:void(0)">
                                            <i class="mdi md-favorite"></i> <span>54</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="mdi md-comment"></i> <span>26</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <a href="" class="btn btn-sm waves-effect btn-white">Read More</a>
                                </div>
                            </div>
                        </div>

                    </div><!-- end blog -->

                </div>
            </div>





            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>