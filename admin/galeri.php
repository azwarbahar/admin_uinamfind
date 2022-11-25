<?php
require_once '../template/header.php';
$foto = mysqli_query($conn, "SELECT * FROM tb_foto");
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

                    <h4 class="page-title">Galeri</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Lainnya</a>
                        </li>
                        <li class="active">
                            Galeri
                        </li>
                    </ol>
                </div>
            </div>



            <!-- SECTION FILTER
                        ================================================== -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="portfolioFilter">
                        <a href="#" data-filter="*" class="current">Semua</a>
                        <a href="#" data-filter=".Mahasiswa">Mahasiswa / Alumni</a>
                        <a href="#" data-filter=".Lembaga">Lembaga Kampus</a>
                        <a href="#" data-filter=".Ukm">UKM</a>
                        <a href="#" data-filter=".Organisasi">Organisasi & Komunitas</a>
                        <a href="#" data-filter=".Informasi">Informasi</a>
                    </div>
                </div>
            </div>

            <div class="row port">
                <div class="portfolioContainer">


                    <?php $i = 1;
                    foreach ($foto as $dta) { ?>

                        <div class="col-sm-6 col-lg-3 col-md-4 <?= $dta['kategori'] ?>">
                            <div class="gal-detail thumb">
                                <?php
                                if ($dta['kategori'] == "Informasi") {
                                ?>
                                    <a href="../assets/images/informasi/<?= $dta['nama_foto'] ?>" class="image-popup" title="<?= $dta['judul'] ?>">
                                        <img src="../assets/images/informasi/<?= $dta['nama_foto'] ?>" class="thumb-img" alt="work-thumbnail">
                                    </a>
                                <?php } else if ($dta['kategori'] == "Mahasiswa") {
                                ?>
                                    <a href="https://api.uinamfind.com/upload/photo/<?= $dta['nama_foto'] ?>" class="image-popup" title="<?= $dta['judul'] ?>">
                                        <img src="https://api.uinamfind.com/upload/photo/<?= $dta['nama_foto'] ?>" class="thumb-img" alt="work-thumbnail">
                                    </a>
                                <?php } else {
                                ?>
                                    <a href="../assets/images/gallery/12.jpg" class="image-popup" title="<?= $dta['judul'] ?>">
                                        <img src="../assets/images/gallery/12.jpg" class="thumb-img" alt="work-thumbnail">
                                    </a>
                                <?php }
                                ?>
                                <h4> <?= $dta['judul'] ?></h4>
                            </div>
                        </div>


                    <?php $i = $i + 1;
                    } ?>


                </div>
            </div> <!-- End row -->




            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>