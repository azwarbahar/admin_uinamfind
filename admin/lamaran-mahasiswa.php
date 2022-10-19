<?php
require_once '../template/header.php';

$lamaran = mysqli_query($conn, "SELECT * FROM tb_lamaran ORDER BY id DESC");
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

                    <h4 class="page-title">Lamaran Mahasiswa</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Fitur</a>
                        </li>
                        <li class="active">
                            Lamaran Mahasiswa
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Lamaran Yang Masuk</b></h4>
                        <p class="text-muted m-b-30 font-13">
                            List lamaran mahasiswa yang terekam di sistem.
                        </p>

                        <table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Tanggal</th>
                                    <th>Email</th>
                                    <th>Lowongan</th>
                                    <th data-hide="phone, tablet">Status</th>
                                </tr>
                            </thead>
                            <div class="form-inline m-b-20">
                                <div class="row">
                                    <div class="col-sm-6 text-xs-center">
                                        <div class="form-group">
                                            <label class="control-label m-r-5">Status</label>
                                            <select id="demo-foo-filter-status" class="form-control input-sm">
                                                <option value="">Show all</option>
                                                <option value="New">New</option>
                                                <option value="Review">Review</option>
                                                <option value="Finished">Finished</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-xs-center text-right">
                                        <div class="form-group">
                                            <input id="demo-foo-search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tbody>


                                <?php $i = 1;
                                foreach ($lamaran as $dta) {
                                    $result_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta[mahasiswa_id]'");
                                    $dta_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
                                    $result_lowongan = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan WHERE id = '$dta[loker_id]'");
                                    $dta_lowongan = mysqli_fetch_assoc($result_lowongan);
                                ?>
                                    <tr>
                                        <td> <a href="mahasiswa-detail.php?id=<?= $dta_mahasiswa['id'] ?>"><?= $dta_mahasiswa['nama_depan'] ?> <?= $dta_mahasiswa['nama_belakang'] ?></a></td>
                                        <td><?= $dta_mahasiswa['jurusan'] ?></td>
                                        <td><?= $dta['tanggal'] ?></td>
                                        <td><?= $dta['email_pelamar'] ?></td>
                                        <td><a href="loker.php?selected_id=<?= $dta['loker_id'] ?>"> <?= $dta_lowongan['posisi'] ?></td>
                                        <?php
                                        if ($dta['status_lamaran'] == "Finished") {
                                            echo "<td><span class='label label-table label-success'>Finished</span></td>";
                                        } else if ($dta['status_lamaran'] == "Review") {
                                            echo "<td><span class='label label-table label-warning'>Review</span></td>";
                                        } else {
                                            echo "<td><span class='label label-table label-default'>New</span></td>";
                                        }
                                        ?>
                                    </tr>

                                <?php $i = $i + 1;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="text-right">
                                            <ul class="pagination pagination-split m-t-30 m-b-0"></ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>