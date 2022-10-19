<?php
require_once '../template/header.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_market_produk WHERE id = '$id'");
$dta = mysqli_fetch_assoc($result);

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
                        <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown"><i class="fa fa-cog"></i></button>
                        <ul class="dropdown-menu drop-menu-right" role="menu">
                            <li><a href="#" type="button" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>">Hapus</a></li>
                            <li><a href="#">Bagikan</a></li>
                        </ul>
                    </div>

                    <!-- MODAL HAPUS -->
                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content bg-inverse">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="color: white;">Hapus Data Produk</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="color: white;">Yakin Ingin Menghapus Data Produk ?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                    <a href="controller/controller-market.php?hapus_produk=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    <h4 class="page-title">Detail Market Produk</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Market</a>
                        </li>
                        <li>
                            <a href="market-produk.php">Produk</a>
                        <li class="active">
                            Detail
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12">
                    <div class="card-box product-detail-box">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="sp-loading"><img src="../assets/images/sp-loading.gif" alt=""><br>LOADING
                                    IMAGES
                                </div>
                                <div class="sp-wrap">
                                    <a href="../assets/images/products/big/1.jpg"><img src="../assets/images/products/big/1.jpg" alt=""></a>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="product-right-info">
                                    <h3><b><?= $dta['judul'] ?></b></h3>
                                    <!-- <div class="rating">
                                        <ul class="list-inline">
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star" href=""></a></li>
                                            <li><a class="fa fa-star-o" href=""></a></li>
                                        </ul>
                                    </div> -->

                                    <!-- <h2> <b>$42</b><small class="text-muted m-l-10"><del>$62</del> </small></b></h2> -->
                                    <h2> <b>Rp. <?= $dta['harga'] ?></b><small class="text-muted">/<?= $dta['satuan'] ?></small></b></h2>

                                    <h5 class="m-t-20"><i class="md md-location-on m-r-10"></i><?= $dta['lokasi'] ?></h5>

                                    <?php
                                    $result_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta[penjual_id]'");
                                    $dta_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
                                    ?>
                                    <h5 class="m-t-20">Penjual : <a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa['id'] ?>"><?= $dta_mahasiswa['nama_depan'] ?> <?= $dta_mahasiswa['nama_belakang'] ?></a></h5>

                                    <h5 class="m-t-20">Nomor Wa : <?= $dta['nomor_wa'] ?></h5>
                                    <?php
                                    $status = $dta['status'];
                                    if ($status == "Active") {
                                        echo "<h5 class='m-t-20'><span class='label label-default m-l-5'>Aktif</span></h5>";
                                    } else {
                                        echo "<h5 class='m-t-20'><span class='label label-danger m-l-5'>Tidak Aktif</span></h5>";
                                    }
                                    ?>
                                    <hr />

                                    <h5 class="font-600">Deskripsi Produk</h5>

                                    <p class="text-muted"><?= $dta['deskripsi'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row m-t-30">
                            <div class="col-xs-12">
                                <h4><b>Produk Lainnya:</b></h4>
                                <div class="table-responsive m-t-20">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="80">Produk</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Penjual</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $produk = mysqli_query($conn, "SELECT * FROM tb_market_produk LIMIT 10 ");
                                            $produk = mysqli_query($conn, "SELECT * FROM tb_market_produk WHERE NOT id='$id' LIMIT 10 ");
                                            foreach ($produk as $dta_produk) {
                                                $no = 1;
                                                $mahasiswa_produk = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta_produk[penjual_id]'");
                                                $dta_mahasiswa_produk = mysqli_fetch_assoc($mahasiswa_produk);
                                            ?>
                                                <tr>
                                                    <td><img src="../assets/images/products/iphone.jpg" class="thumb-sm" alt=""> </td>
                                                    <td><a href="market-produk-detail.php?id=<?= $dta_produk['id'] ?>"><?= $dta_produk['judul'] ?></td>
                                                    <td><?= $dta_produk['harga'] ?></td>
                                                    <td> <a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa_produk['id'] ?>"><?= $dta_mahasiswa_produk['nama_depan'] ?> <?= $dta_mahasiswa_produk['nama_belakang'] ?></a> </td>

                                                    <?php
                                                    $status = $dta_produk['status'];
                                                    if ($status == "Active") {
                                                        echo "<td><span class='label label-default'> Aktif </span></td>";
                                                    } else {
                                                        echo "<td><span class='label label-danger'> Tidak Aktif </span></td>";
                                                    }
                                                    ?>
                                                </tr>
                                            <?php
                                                $no = $no + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div> <!-- end card-box/Product detai box -->
                </div> <!-- end col -->
            </div> <!-- end row -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>