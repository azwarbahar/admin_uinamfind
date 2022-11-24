<?php
require_once '../template/header.php';
$recruiter = mysqli_query($conn, "SELECT * FROM tb_recruiter ORDER BY id DESC");
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

                    <h4 class="page-title">Data Recruiter</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li class="active">
                            Data Recruiter
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <!-- <h4 class="m-t-0 header-title"><b>Buttons example</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            The Buttons extension for DataTables provides a common set of options, API methods and
                            styling to display buttons on a page that will interact with a DataTable. The core
                            library provides the based framework upon which plug-ins can built.
                        </p> -->
                        <!-- <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30">Tambah</a> -->

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php $i = 1;
                                foreach ($recruiter as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="../assets/images/small/img4.jpg" alt="image" class="img-circle  thumb-sm ">
                                        </td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><a href="perusahaan-detail.php?id=<?= $dta['id_perusahaan'] ?>"> <?= $dta['nama_perusahaan'] ?></a></td>
                                        <td><?= $dta['jabatan'] ?></td>
                                        <?php

                                        if ($dta['status'] == "Active") {
                                            echo "<td><span class='label label-default'> Aktif </span></td>";
                                        } else if ($dta['status'] == "Banned") {
                                            echo "<td><span class='label label-danger'> Banned </span></td>";
                                        } else {
                                            echo "<td><span class='label label-warning'> Non Aktif </span></td>";
                                        }

                                        ?>
                                        <td style="text-align: center;">
                                            <a href="recruiter-detail.php?id=<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
                                        </td>
                                    </tr>
                                <?php $i = $i + 1;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <!-- <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="custom-modal-title">Add Contact</h4>
                <div class="custom-modal-text text-left">
                    <form role="form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" placeholder="Enter position">
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" id="company" placeholder="Enter company">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>

                        <button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
                    </form>
                </div>
            </div> -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>