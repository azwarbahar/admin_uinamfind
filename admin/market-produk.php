<?php
require_once '../template/header.php';
$produk = mysqli_query($conn, "SELECT * FROM tb_market_produk ORDER BY id DESC");
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

                    <h4 class="page-title">Market Produk</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Market</a>
                        </li>
                        <li class="active">
                            Produk
                        </li>
                    </ol>
                </div>
            </div>




            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <!-- <div class="row m-t-10 m-b-10">
                            <div class="col-sm-6 col-lg-8">
                                <form role="form">
                                    <div class="form-group contact-search m-b-30">
                                        <input type="text" id="search" class="form-control" placeholder="Search...">
                                        <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                    </div> 
                                </form>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="h5 m-0">
                                    <span class="vertical-middle">Sort By:</span>
                                    <div class="btn-group vertical-middle" data-toggle="buttons">
                                        <label class="btn btn-white btn-md waves-effect active">
                                            <input type="radio" autocomplete="off" checked=""> Status
                                        </label>
                                        <label class="btn btn-white btn-md waves-effect">
                                            <input type="radio" autocomplete="off"> Type
                                        </label>
                                        <label class="btn btn-white btn-md waves-effect">
                                            <input type="radio" autocomplete="off"> Name
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> -->



                        <h4 class="m-t-0 header-title"><b>Produk yang diupload</b></h4>
                        <div class="table-responsive">
                            <table class="table table-actions-bar">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Penjual</th>
                                        <th>Kontak</th>
                                        <th>Status</th>
                                        <th style="min-width: 80px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $i = 1;
                                    foreach ($produk as $dta) { ?>
                                        <tr>
                                            <td><img src="../assets/images/products/iphone.jpg" class="thumb-sm" alt=""> </td>
                                            <td><?= $dta['judul'] ?></td>
                                            <td><?= $dta['harga'] ?>/<?= $dta['satuan'] ?></td>
                                            <?php
                                            $result_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta[penjual_id]'");
                                            $dta_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
                                            ?>
                                            <td>
                                                <a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa['id'] ?>" class="text-dark"><b><?= $dta_mahasiswa['nama_depan'] ?> <?= $dta_mahasiswa['nama_belakang'] ?></b></a>
                                            </td>

                                            <td><?= $dta['nomor_wa'] ?></td>
                                            <?php
                                            $status = $dta['status'];
                                            if ($status == "Active") {
                                                echo "<td><span class='label label-default'> Aktif </span></td>";
                                            } else {
                                                echo "<td><span class='label label-danger'> Tidak Aktif </span></td>";
                                            }
                                            ?>
                                            <td>
                                                <a href="market-produk-detail.php?id=<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-visibility"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="table-action-btn"><i class="md md-delete"></i></a>
                                            </td>
                                        </tr>


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
                                                        <p style="color: white;">Yakin Ingin Menghapus Data Produk Tersebut ?</p>
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

                                    <?php $i = $i + 1;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> <!-- end col -->


            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>