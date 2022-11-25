<?php
require_once '../template/header.php';

$mahasiswa_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$mahasiswa_id'");
$dta = mysqli_fetch_assoc($result);

?>
<!-- Content -->


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
                            <li><a href="#">Reset Password</a></li>
                            <li class="divider"></li>
                            <?php

                            $status_akun = $dta['status_akun'];
                            if ($status_akun == "Banned") {
                                echo "<li><a href='' data-toggle='modal' data-target='.banned-mahasiswa'>Buka Banned</a></li>";
                            } else {
                                echo "<li><a style='color: #E60013 ;' href='' data-toggle='modal' data-target='.banned-mahasiswa'>Banned Akun</a></li>";
                            }

                            ?>

                        </ul>
                    </div>

                    <div class="modal fade banned-mahasiswa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="mySmallModalLabel">Ingin Banned Akun ini ?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Ini berarti pemilik akun tidak dapat loin maupun mengakses aplikasi. </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                                    <a href="controller/controller-mahasiswa.php?ban_mhs=true&id=<?= $mahasiswa_id ?>&status_akun=<?= $dta['status_akun'] ?>" type="button" class="btn btn-primary waves-effect waves-light">Ok</a>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <h4 class="page-title">Mahasiswa</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li>
                            <a href="mahasiswa.php">Data Mahasiswa</a>
                        </li>
                        <li class="active">
                            Detail
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="profile-detail card-box">
                        <div>
                            <img src="https://api.uinamfind.com/upload/photo/<?= $dta['foto'] ?>" class="img-circle" alt="profile-image">

                            <!-- <ul class="list-inline status-list m-t-20">
                                <li>
                                    <h3 class="text-primary m-b-5">456</h3>
                                    <p class="text-muted">Followings</p>
                                </li>

                                <li>
                                    <h3 class="text-success m-b-5">5864</h3>
                                    <p class="text-muted">Followers</p>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-pink btn-custom btn-rounded waves-effect waves-light">Follow</button> -->

                            <hr>
                            <h4 class="text-uppercase font-600">Tentang Saya</h4>
                            <p class="text-muted font-13 m-b-30">
                                <?php

                                $tentang = $dta['tentang_user'];
                                if ($tentang == "" || $tentang == null) {
                                    echo ' ......... ';
                                } else {
                                    echo $tentang;
                                }

                                ?>
                            </p>

                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Nama :</strong> <span class="m-l-15"><?= $dta['nama_depan'] . ' ' . $dta['nama_belakang'] ?></span></p>

                                <p class="text-muted font-13"><strong>Telpon :</strong><span class="m-l-15"><?= $dta['telpon'] ?></span></p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?= $dta['email'] ?></span></p>

                                <p class="text-muted font-13"><strong>Lokasi :</strong> <span class="m-l-15"><?= $dta['lokasi'] ?></span></p>

                            </div>

                            <div class="button-list m-t-20">
                                <?php

                                $sosmed = mysqli_query($conn, "SELECT * FROM tb_sosmed WHERE kategori = 'Mahasiswa' AND from_id = '$mahasiswa_id'");

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
                        $skill = mysqli_query($conn, "SELECT * FROM tb_skills_user WHERE user_id = '$mahasiswa_id'");
                        $row_skill = mysqli_num_rows($skill);
                        $row_skill_final = $row_skill;
                        ?>
                        <h4 class="m-t-0 m-b-20 header-title"><b>Skill <span class="text-muted">(<?= $row_skill_final ?>)</span></b></h4>

                        <div class="friend-list">

                            <?php
                            foreach ($skill as $dta_skill) {
                            ?>
                                <button href="" class="btn btn-default btn-custom btn-rounded waves-effect waves-light">
                                    <?= $dta_skill['nama_skill'] ?>
                                </button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="card-box">
                        <?php

                        $get_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user WHERE jurusan = '$dta[jurusan]'");
                        $get_mahasiswa_limit = mysqli_query($conn, "SELECT * FROM tb_user WHERE jurusan = '$dta[jurusan]' AND NOT id='$mahasiswa_id' LIMIT 7");
                        $row_get_mahasiswa = mysqli_num_rows($get_mahasiswa);
                        $row_get_mahasiswa_final = $row_get_mahasiswa;
                        ?>

                        <h4 class="m-t-0 m-b-20 header-title"><b>Sejurusan <span class="text-muted">(<?= $row_get_mahasiswa_final ?>)</span></b></h4>

                        <div class="friend-list">
                            <?php
                            foreach ($get_mahasiswa_limit as $dta_get_mahasiswa_limit) {
                            ?>
                                <a href="mahasiswa-detail.php?id=<?= $dta_get_mahasiswa_limit['id'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= $dta_get_mahasiswa_limit['nama_depan'] . ' ' . $dta_get_mahasiswa_limit['nama_belakang'] ?>">
                                    <img src="https://api.uinamfind.com/upload/photo/<?= $dta_get_mahasiswa_limit['foto'] ?>" class="img-circle thumb-md" alt="friend">
                                </a>

                            <?php
                            }
                            ?>
                            <a href="mahasiswa.php" class="text-center">
                                <span class="extra-number">+<?= $row_get_mahasiswa_final ?></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 col-lg-6">


                    <!-- PENGALAMAN -->
                    <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-inverse">
                                <h3 class="portlet-title">
                                    Pengalaman
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-inverse"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-inverse" class="panel-collapse collapse in">
                                <div class="portlet-body">

                                    <?php

                                    $get_pengalaman = mysqli_query($conn, "SELECT * FROM tb_pengalaman_user WHERE user_id = '$mahasiswa_id'");

                                    foreach ($get_pengalaman as $dta_get_pengalaman) {
                                    ?>
                                        <div class="card-box m-b-10">
                                            <div class="table-box opport-box">
                                                <div class="table-detail">
                                                    <img src="../assets/images/brand/envato.jpg" alt="img" class="img-circle thumb-lg m-r-15" />
                                                </div>

                                                <div class="table-detail">
                                                    <div class="member-info">
                                                        <h4 class="m-t-0"><b><?= $dta_get_pengalaman['judul'] ?> </b></h4>
                                                        <p class="text-dark m-b-5"><b>Tempat: </b> <span class="text-muted"><?= $dta_get_pengalaman['nama_tempat'] . ' - ' . $dta_get_pengalaman['lokasi_tempat'] ?></span></p>
                                                        <p class="text-dark m-b-5"><b><?= $dta_get_pengalaman['tanggal_mulai'] . ' - ' . $dta_get_pengalaman['tanggal_berakhir'] ?> </b></p>
                                                    </div>
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


                    <!-- ORGANISASI -->
                    <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-success">
                                <h3 class="portlet-title">
                                    Organisasi
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-success" class="panel-collapse collapse in">
                                <div class="portlet-body">


                                    <?php

                                    $get_organisasi = mysqli_query($conn, "SELECT * FROM tb_organisasi_user WHERE user_id = '$mahasiswa_id'");

                                    foreach ($get_organisasi as $dta_get_organisasi) {
                                    ?>
                                        <div class="card-box m-b-10">
                                            <div class="table-box opport-box">
                                                <div class="table-detail">
                                                    <img src="../assets/images/brand/envato.jpg" alt="img" class="img-circle thumb-lg m-r-15" />
                                                </div>

                                                <div class="table-detail">
                                                    <div class="member-info">
                                                        <h4 class="m-t-0"><b><?= $dta_get_organisasi['jabatan'] ?> </b></h4>
                                                        <p class="text-dark m-b-5"><b>Nama: </b> <span class="text-muted"><?= $dta_get_organisasi['nama_organisasi'] ?></span></p>
                                                        <p class="text-dark m-b-5"><b><?= $dta_get_organisasi['tanggal_mulai'] . ' - ' . $dta_get_organisasi['tanggal_berakhir'] ?> </b></p>
                                                    </div>
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


                    <!-- SERTIFIKASI -->
                    <!-- <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-purple">
                                <h3 class="portlet-title">
                                    Sertifikasi / Pencapaian
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-purple"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-purple" class="panel-collapse collapse in">
                                <div class="portlet-body">


                                    <div class="card-box m-b-10">
                                        <div class="table-box opport-box">
                                            <div class="table-detail">
                                                <img src="../assets/images/brand/envato.jpg" alt="img" class="img-circle thumb-lg m-r-15" />
                                            </div>

                                            <div class="table-detail">
                                                <div class="member-info">
                                                    <h4 class="m-t-0"><b>Envato Market Pty Ltd. </b></h4>
                                                    <p class="text-dark m-b-5"><b>Category: </b> <span class="text-muted">Branch manager</span></p>
                                                </div>
                                            </div>

                                            <div class="table-detail lable-detail">
                                                <span class="label label-info">Hot</span>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div> -->


                    <!-- PENDIDIKAN -->
                    <div class="col-lg-12">
                        <div class="portlet">
                            <div class="portlet-heading bg-primary">
                                <h3 class="portlet-title">
                                    Pendidikan
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="bg-primary" class="panel-collapse collapse in">
                                <div class="portlet-body">

                                    <?php

                                    $get_pendidikan = mysqli_query($conn, "SELECT * FROM tb_pendidikan_user WHERE user_id = '$mahasiswa_id'");

                                    foreach ($get_pendidikan as $dta_get_pendidikan) {
                                    ?>
                                        <div class="card-box m-b-10">
                                            <div class="table-box opport-box">
                                                <div class="table-detail">
                                                    <img src="../assets/images/brand/envato.jpg" alt="img" class="img-circle thumb-lg m-r-15" />
                                                </div>

                                                <div class="table-detail">
                                                    <div class="member-info">
                                                        <h4 class="m-t-0"><b><?= $dta_get_pendidikan['pendidikan'] ?> </b></h4>
                                                        <p class="text-dark m-b-5"><b>Nama: </b> <span class="text-muted"><?= $dta_get_pendidikan['nama_tempat'] ?></span></p>
                                                        <p class="text-dark m-b-5"><b><?= $dta_get_pendidikan['tanggal_masuk'] . ' - ' . $dta_get_pendidikan['tanggal_berakhir'] ?> </b></p>
                                                    </div>
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
                <div class="col-md-4 col-lg-3">

                    <h4><b>Kemahasiswan :</b></h4>
                    <div class="table-responsive m-t-20">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50">NIM</td>
                                    <td>
                                        : <?= $dta['nim'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        : <?= $dta['email_uinam'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <td>
                                        : <?= $dta['fakultas'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>
                                        : <?= $dta['jurusan'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>
                                        : <?= $dta['tahun_masuk'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:
                                        <?php
                                        $status = $dta['tahun_masuk'];
                                        if ($status == "Lulus") {
                                            echo "<span class='label label-inverse'> Alumni </span>";
                                        } else {
                                            echo "<span class='label label-default'> Mahasiswa Aktif </span>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h4><b>Data Lainnya :</b></h4>
                    <div class="table-responsive m-t-20">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="50">Username</td>
                                    <td>
                                        : <?= $dta['username'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>
                                        : <?= $dta['lokasi'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        : <?= $dta['alamat'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>
                                        : <?= $dta['jenis_kelamin'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Suku</td>
                                    <td>
                                        : <?= $dta['suku'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat</td>
                                    <td>
                                        : <?= $dta['tempat_lahir'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>
                                        : <?= $dta['tanggal_lahir'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Akun</td>
                                    <td>
                                        : <?= $dta['status_akun'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- End Content -->
            <?php
            require_once '../template/footer.php';
            ?>