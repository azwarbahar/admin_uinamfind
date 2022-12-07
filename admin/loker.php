<?php
require_once '../template/header.php';
$get_id = "";
$first_open = null;
$loker = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan ORDER BY id DESC");
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

                    <h4 class="page-title">Lowongan Kerja</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Fitur</a>
                        </li>
                        <li class="active">
                            Data Loker
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4" style="overflow-y: scroll; max-height: 1000px;">
                    <!-- <div class=" card-box"> -->
                    <h4 class="m-t-0 header-title"><b>Lowongan Pekerjaan</b></h4>

                    <?php
                    foreach ($loker as $dta) {
                        if ($first_open == 1) {
                            $get_id = $dta['id'];
                            $first_open = 0;
                        }
                        $result_perusahaan = mysqli_query($conn, "SELECT * FROM tb_perusahaan WHERE id = '$dta[perusahaan_id]'");
                        $dta_perusahaan = mysqli_fetch_assoc($result_perusahaan);
                        if ($get_id == $dta['id']) {
                            echo "<div class='card-box bg-inverse'>";
                        } else {
                            echo "<div class='card-box'>";
                        }
                    ?>

                        <a href="#">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"> <img class="media-object img-circle" alt="<?= $dta_perusahaan['nama'] ?>" src="https://api.uinamfind.com/upload/perusahaan/<?= $dta_perusahaan['foto'] ?>" style="width: 64px; height: 64px;"> </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"> <a href="loker.php?selected_id=<?= $dta['id'] ?>"><?= $dta['posisi'] ?></a></h4>
                                    <p>
                                        <span><a href="perusahaan-detail.php?id<?= $dta_perusahaan['id'] ?>" class="text-muted"><?= $dta_perusahaan['nama'] ?></a></span>
                                    </p>
                                    <?php

                                    if ($dta['gaji_tersedia'] == "Ya") {
                                        echo "<span>Gaji : $dta[gaji_min] - $dta[gaji_max] </span>";
                                    } else {
                                        echo "<span>Gaji : -</span>";
                                    }

                                    ?>

                                    <p>
                                        <b>Lokasi:</b>
                                        <span class="text-muted"><?= $dta['lokasi'] ?></span>
                                    </p>
                                    <span class='label label-danger'> <?= $dta['jenis_pekerjaan'] ?> </span>
                                </div>
                            </div>
                        </a>
                </div>


            <?php
                    } ?>



            </div>
            <?php

            $result_selected = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan WHERE id = '$get_id'");
            $dta_selected = mysqli_fetch_assoc($result_selected);
            ?>
            <div class="col-sm-8">
                <div class="card-box">
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown"><i class="fa fa-cog"></i></button>
                        <ul class="dropdown-menu drop-menu-right" role="menu">
                            <li><a href="#">Hapus</a></li>
                            <li><a href="#">Bagikan</a></li>

                        </ul>
                    </div>
                    <div class="product-right-info">
                        <h3><b><?= $dta_selected['posisi'] ?></b></h3>
                        <?php
                        $result_perusahaan_selected = mysqli_query($conn, "SELECT * FROM tb_perusahaan WHERE id = '$dta_selected[perusahaan_id]'");
                        $dta_perusahaan_selected = mysqli_fetch_assoc($result_perusahaan_selected);
                        ?>
                        <p> <a href="perusahaan-detail.php?id=<?= $dta_selected['perusahaan_id'] ?>"><?= $dta_perusahaan_selected['nama'] ?></a></p>
                        <p> Lokasi : <?= $dta_selected['lokasi'] ?></p>

                        <?php

                        if ($dta_selected['gaji_tersedia'] == "Ya") {
                            echo "<span>Rentang Gaji : $dta_selected[gaji_min] - $dta_selected[gaji_max] </span>";
                        } else {
                            echo "<span>Rentang Gaji : -</span>";
                        }

                        if ($dta_selected['lamar_mudah'] == "Ya") {
                            echo "<p> Link Lamaran : -</p>";
                        } else {
                            echo "<p> Link Lamaran : <a href='$dta_selected[link_lamar]' target='_blank'> $dta_selected[link_lamar] </a></p>";
                        }

                        ?>

                        <p> Tanggal : <?= $dta_selected['created_at'] ?></p>
                        <?php
                        $result_recruiter_selected = mysqli_query($conn, "SELECT * FROM tb_recruiter WHERE id = '$dta_selected[recruiter_id]'");
                        $dta_recruiter_selected = mysqli_fetch_assoc($result_recruiter_selected);
                        ?>
                        <p> By : <a href="recruiter-detail.php?id=<?= $dta_recruiter_selected['id'] ?>"><?= $dta_recruiter_selected['nama'] ?></a> </p>
                        <span class="label label-danger"><?= $dta_selected['jenis_pekerjaan'] ?></span>

                        <hr>

                        <h5 class="font-600">Jobdesk</h5>

                        <p class="text-muted"><?= $dta_selected['jobdesk'] ?></p>

                        <h5 class="font-600">Deskripsi</h5>

                        <p class="text-muted"><?= $dta_selected['deskripsi'] ?></p>

                        <?php

                        if ($dta_selected['lamar_mudah'] == "Ya") {
                        ?>

                            <br>
                            <h4><b>Yang Melamar :</b></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="80">No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $lamaran = mysqli_query($conn, "SELECT * FROM tb_lamaran WHERE loker_id = '$dta_selected[id]'");
                                        foreach ($lamaran as $dta_lamaran) {
                                            $no = 1;
                                            $mahasiswa_lamaran = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta_lamaran[mahasiswa_id]'");
                                            $dta_mahasiswa_lamaran = mysqli_fetch_assoc($mahasiswa_lamaran);
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td> <a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa_lamaran['id'] ?>"><?= $dta_mahasiswa_lamaran['nama_depan'] ?> <?= $dta_mahasiswa_lamaran['nama_belakang'] ?></a> </td>
                                                <td><?= $dta_lamaran['tanggal'] ?></td>
                                                <td><?= $dta_lamaran['status_lamaran'] ?></td>
                                            </tr>
                                        <?php
                                            $no = $no + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
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