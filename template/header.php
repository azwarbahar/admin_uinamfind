<?php

require('../koneksi.php');


if (!isset($_SESSION['login_super'])) {
    header("location: ../login.php");
}

$get_id_session = $_SESSION['get_id'];
$query_header_akun = mysqli_query($conn, "SELECT * FROM tb_admin_super WHERE id = '$get_id_session'");
$get_data_akun = mysqli_fetch_assoc($query_header_akun);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="../assets/images/icon_uianam_bulat.ico">

    <title>UINAM Find - Admin Dashboard</title>
    <link href="../assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />


    <link href="../assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/7c872c3741.js" crossorigin="anonymous"></script>

    <!-- Plugins css-->
    <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <!--venobox lightbox-->
    <link rel="stylesheet" href="../assets/plugins/magnific-popup/css/magnific-popup.css" />


    <link href="../assets/plugins/footable/css/footable.core.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="../assets/js/modernizr.min.js"></script>

</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <!-- <a href="index.php" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a> -->
                    <!-- Image Logo here -->
                    <a href="index.php" class="logo">
                        <i class="icon-c-logo"> <img src="../assets/images/icon_uianam.png" height="42" /> </i>
                        <span><img src="../assets/images/logo_text.png" height="20" /></span>
                    </a>
                </div>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="md md-menu"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>

                        <!-- <ul class="nav navbar-nav hidden-xs">
                                <li><a href="#" class="waves-effect waves-light">Files</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form> -->


                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                            </li>
                            <li class="dropdown top-menu-item-xs">
                                <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="../assets/images/admin/<?= $get_data_akun['foto'] ?>" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="ti-user m-r-10 text-custom"></i> <?= $get_data_akun['nama'] ?></a></li>
                                    <li class="divider"></li>
                                    <li><a href="" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->




        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="mySmallModalLabel">Logout Akun</h4>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Logout Akun ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <a href="../logout.php?logout=true&for=login_super" type="button" class="btn btn-primary waves-effect waves-light">Logout</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- ========== Left Sidebar Start ========== -->


        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>

                        <!-- <li class="text-muted menu-title">Master Data</li> -->

                        <li class="has_sub">
                            <a href="home.php" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(1);" class="waves-effect"><i class="ti-server"></i> <span> Master Data </span> <span class="menu-arrow"></span></a>
                            <ul class="list">
                                <li><a href="mahasiswa.php"> Data Mahasiswa</a></li>
                                <li><a href="recruiter.php">Data Recruiter</a></li>
                                <li><a href="lembaga.php">Data Lembaga Kampus</a></li>
                                <li><a href="ukm.php">Data UKM</a></li>
                                <li><a href="organisasi.php">Data Organisasi / Komunitas</a></li>
                                <li><a href="perusahaan.php">Data Perusahaan</a></li>
                            </ul>
                        </li>


                        <li class="text-muted menu-title"></li>
                        <li class="text-muted menu-title">Fitur</li>

                        <li class="has_sub">
                            <a href="loker.php" class="waves-effect"><i class="ti-archive"></i> <span> Data Loker </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="magang.php" class="waves-effect"><i class="ti-archive"></i> <span> Data Magang </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="lamaran-mahasiswa.php" class="waves-effect"><i class="ti-envelope"></i> <span> Lamaran Mahasiswa </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="beasiswa.php" class="waves-effect"><i class="ti-money"></i> <span> Info Beasiswa </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="market-produk.php" class="waves-effect"><i class="ti-shopping-cart"></i> <span> UINAMarket </span></a>
                        </li>
                        <!-- <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart"></i> <span> UINAMarket </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="market-produk.php"> Produk </a></li>
                                <li><a href="market-digital.php"> Digital </a></li>
                            </ul>
                        </li> -->


                        <!-- <li class="text-muted menu-title"></li>
                        <li class="text-muted menu-title">Aktifitas</li>

                        <li class="has_sub">
                            <a href="log-mahasiswa.php" class="waves-effect"><i class="ti-user"></i> <span> Log Mahasiswa </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="log-recruiter.php" class="waves-effect"><i class="ti-user"></i> <span> Log Recruiter </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="log-laporan.php" class="waves-effect"><i class="ti-alert"></i> <span> Report </span></a>
                        </li> -->


                        <li class="text-muted menu-title"></li>
                        <li class="text-muted menu-title">Administrator</li>

                        <li class="has_sub">
                            <a href="admin-super.php" class="waves-effect"><i class="ti-id-badge"></i> <span> Super Admin </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="admin-jurusan.php" class="waves-effect"><i class="ti-id-badge"></i> <span> Admin Jurusan </span></a>
                        </li>


                        <li class="text-muted menu-title"></li>
                        <li class="text-muted menu-title">Lainnya</li>

                        <li class="has_sub">
                            <a href="galeri.php" class="waves-effect"><i class="ti-gallery"></i> <span> Galeri </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="informasi.php" class="waves-effect"><i class="ti-info-alt"></i> <span> Informasi </span></a>
                        </li>

                        <!-- <li class="has_sub">
                            <a href="pesan.php" class="waves-effect"><i class="ti-email"></i> <span> Pesan </span></a>
                        </li> -->


                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <!-- Left Sidebar End -->