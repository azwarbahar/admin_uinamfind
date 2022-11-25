<?php
require_once '../template/header.php';
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
                    <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Selamat datang di admin UINAM Find !</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-person text-primary"></i>
                        <?php
                        $recruiter = mysqli_query($conn, "SELECT * FROM tb_recruiter");
                        $row_recruiter = mysqli_num_rows($recruiter);
                        $row_recruiter_final = $row_recruiter;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_recruiter_final ?></h2>
                        <div class="text-muted m-t-5">Recruiter</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-assignment text-pink"></i>
                        <?php
                        $loker = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan");
                        $row_loker = mysqli_num_rows($loker);
                        $row_loker_final = $row_loker;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_loker_final ?></h2>
                        <div class="text-muted m-t-5">Lowongan Kerja</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-domain text-info"></i>
                        <?php
                        $perusahaan = mysqli_query($conn, "SELECT * FROM tb_perusahaan");
                        $row_perusahaan = mysqli_num_rows($perusahaan);
                        $row_perusahaan_final = $row_perusahaan;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_perusahaan_final ?></h2>
                        <div class="text-muted m-t-5">Perusahaan</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-receipt text-custom"></i>
                        <?php
                        $beasiswa = mysqli_query($conn, "SELECT * FROM tb_beasiswa");
                        $row_beasiswa = mysqli_num_rows($beasiswa);
                        $row_beasiswa_final = $row_beasiswa;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_beasiswa_final ?></h2>
                        <div class="text-muted m-t-5">Beasiswa</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">

                    <div class="portlet">
                        <div class="portlet-heading portlet-default">
                            <h3 class="portlet-title text-dark">
                                Loker Terbaru
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-loker-terbaru"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div id="bg-loker-terbaru" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <a href="loker.php" class="btn btn-default btn-sm waves-effect waves-light">View All</a>
                                <div class="p-20">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Posis</th>
                                                <th>Perusahaan</th>
                                                <th>Lokasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $loker = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan ORDER BY id DESC LIMIT 5");
                                            foreach ($loker as $dta_loker) {
                                                $nomor = 1;
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $nomor ?></th>
                                                    <td><?= $dta_loker['posisi'] ?></td>
                                                    <?php
                                                    $perusahaan_loker = mysqli_query($conn, "SELECT * FROM tb_perusahaan WHERE id = '$dta_loker[perusahaan_id]'");
                                                    $dta_perusahaan_loker = mysqli_fetch_assoc($perusahaan_loker);
                                                    ?>
                                                    <td> <a href="perusahaan-detail.php?id=<?= $dta_perusahaan_loker['id'] ?>"> <?= $dta_perusahaan_loker['nama'] ?> </a> </td>
                                                    <td><?= $dta_loker['lokasi'] ?></td>
                                                    <td>
                                                        <a href="loker.php?selected_id=<?= $dta_loker['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $nomor = $nomor + 1;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet">
                        <div class="portlet-heading portlet-default">
                            <h3 class="portlet-title text-dark">
                                UINAM Market
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-market"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div id="bg-market" class="panel-collapse collapse in">
                            <div class="portlet-body">

                                <a href="market-produk.php" class="btn btn-default btn-sm waves-effect waves-light">View All</a>

                                <div class="table-responsive">
                                    <table class="table table-actions-bar">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Lokasi</th>
                                                <th style="min-width: 80px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $produk = mysqli_query($conn, "SELECT * FROM tb_market_produk ORDER BY id DESC LIMIT 5");
                                            foreach ($produk as $dta_produk) {
                                                $nomor = 1;
                                            ?>
                                                <tr>
                                                    <td><img src="../assets/images/products/iphone.jpg" class="thumb-sm" alt=""> </td>
                                                    <td><?= $dta_produk['judul'] ?></td>
                                                    <td>Rp. <?= $dta_produk['harga'] ?></td>
                                                    <td><?= $dta_produk['lokasi'] ?></td>
                                                    <td>
                                                        <a href="market-produk-detail.php?id=<?= $dta_produk['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $nomor = $nomor + 1;
                                            } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-5">

                    <div class="portlet">
                        <div class="portlet-heading portlet-default">
                            <h3 class="portlet-title text-dark">
                                Baru Perbarui Data
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-loker"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-loker" class="panel-collapse collapse in">
                            <div class="portlet-body ">

                                <a href="mahasiswa.php" class="btn btn-default btn-sm waves-effect waves-light">View All</a>
                                <br><br>


                                <?php
                                $mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY updated_at DESC LIMIT 2");
                                foreach ($mahasiswa as $dta_mahasiswa) {
                                ?>

                                    <div class="card-box">
                                        <div class="contact-card">
                                            <a class="pull-left" target="_blank" href="https://api.uinamfind.com/upload/photo/<?= $dta_mahasiswa['foto'] ?>">
                                                <img class="img-circle" src="https://api.uinamfind.com/upload/photo/<?= $dta_mahasiswa['foto'] ?>" alt="">
                                            </a>

                                            <div class="member-info">
                                                <h4 class="m-t-0 m-b-5 header-title"><b><?= $dta_mahasiswa['nama_depan'] ?> <?= $dta_mahasiswa['nama_belakang'] ?></b></h4>
                                                <p class="text-muted"><?= $dta_mahasiswa['username'] ?></p>
                                                <p class="text-dark"><i class="md md-business m-r-10"></i><small><?= $dta_mahasiswa['jurusan'] ?> - <?= $dta_mahasiswa['tahun_masuk'] ?></small></p>
                                                <!-- <div class="m-t-20"> -->
                                                <a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa['id'] ?>" class="btn btn-pink waves-effect waves-light btn-sm">Lihat</a>
                                                <!-- <a href="#" class="btn btn-success waves-effect waves-light btn-sm m-l-5">Edit</a>
                                                    <a href="#" class="btn btn-pink waves-effect waves-light btn-sm m-l-5">Call</a> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="portlet">
                        <div class="portlet-heading portlet-default">
                            <h3 class="portlet-title text-dark">
                                Beasiswa Terbaru
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-beasiswa"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-beasiswa" class="panel-collapse collapse in">
                            <div class="portlet-body">

                                <a href="beasiswa.php" class="btn btn-default btn-sm waves-effect waves-light">View All</a>
                                <br><br>

                                <?php
                                $beasiswa = mysqli_query($conn, "SELECT * FROM tb_beasiswa ORDER BY id DESC LIMIT 2");
                                foreach ($beasiswa as $dta_beasiswa) {
                                ?>
                                    <div class="card-box">
                                        <div class="contact-card">
                                            <a class="pull-left" href="#">
                                                <img class="img-circle" src="../assets/images/users/avatar-6.jpg" alt="">
                                            </a>
                                            <div class="member-info">
                                                <h4 class="m-t-0 m-b-5 header-title"> <a href="beasiswa.php?selected_id=<?= $dta_beasiswa['id'] ?>"><b><?= $dta_beasiswa['judul'] ?></b></a> </h4>
                                                <p class="text-dark"><i class="md md-business m-r-10"></i><small><?= $dta_beasiswa['instansi'] ?></small></p>
                                                <p class="text-muted">Batas Akhir : <?= $dta_beasiswa['batas_tanggal'] ?></p>

                                                <?php
                                                $status = $dta_produk['status'];
                                                if ($status == "Active") {
                                                    echo "<span class='label label-default'> Aktif </span>";
                                                } else {
                                                    echo "<span class='label label-danger'> Tidak Aktif </span>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

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