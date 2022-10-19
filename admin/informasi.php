<?php
require_once '../template/header.php';
$informasi = mysqli_query($conn, "SELECT * FROM tb_informasi");
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

                    <h4 class="page-title">Informasi</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Lainnya</a>
                        </li>
                        <li class="active">
                            Informasi
                        </li>
                    </ol>
                </div>
            </div>




            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">


                        <!-- MODAL TABAH INFORMASI -->
                        <div id="con-close-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                        <h4 class="modal-title">Tambah Informasi</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-informasi.php" enctype="multipart/form-data">


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Judul</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Judul Informasi" name="judul" id="judul">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control autogrow" id="deskripsi" required name="deskripsi" placeholder="Deskripsi" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 104px; width: 558px;"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Foto</label>
                                                <div class="col-sm-10 bootstrap-filestyle">
                                                    <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto" id="foto" required>
                                                    <div class="row text-info" id="viewProgress" hidden="">
                                                        <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cakupan Tayangan</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="cakupan" id="cakupan" required="">
                                                        <option value=""> - Pilih -</option>
                                                        <option value="Semua">Semua</option>
                                                        <option value="Mahasiswa">Mahasiswa</option>
                                                        <option value="Recruiter">Recruiter</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="hidden" name="admin_id" value="<?= $get_data_akun['id'] ?>">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_informasi" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH INFORMASI -->

                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah</a>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Cakupan</th>
                                    <th>Penulis</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>

                                <?php $i = 1;
                                foreach ($informasi as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <a href="../assets/images/informasi/<?= $dta['gambar'] ?>" target="_blank"> <img src="../assets/images/informasi/<?= $dta['gambar'] ?>" alt="image" class="thumb-sm "></a>
                                        </td>
                                        <td><?= $dta['judul'] ?></td>
                                        <?php
                                        $cakupan = $dta['cakupan'];
                                        if ($cakupan == "Recruiter") {
                                            echo "<td><span class='label label-danger'> Recruiter </span></td>";
                                        } else if ($cakupan == "Mahasiswa") {
                                            echo "<td><span class='label label-default'> Mahasiswa </span></td>";
                                        } else {
                                            echo "<td><span class='label label-success'> Semua </span></td>";
                                        }
                                        $result_admin = mysqli_query($conn, "SELECT * FROM tb_admin_super WHERE id = '$dta[penulis_id]'");
                                        $dta_admin = mysqli_fetch_assoc($result_admin);
                                        ?>
                                        <td><?= $dta_admin['nama'] ?></td>
                                        <?php
                                        $status = $dta['status'];
                                        if ($status == "Active") {
                                            echo "<td><span class='label label-success'> Tayang </span></td>";
                                        } else {
                                            echo "<td><span class='label label-danger'> Tidak Tayang </span></td>";
                                        }
                                        ?>
                                        <td style="text-align: center;">
                                            <a href="#" type="button" data-toggle="modal" data-target="#edit-<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-edit"></i></a>
                                            <a href="#" type="button" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>

                                    <!-- MODAL EDIT INFORMASI -->
                                    <div id="edit-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Tambah Informasi</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="controller/controller-informasi.php" enctype="multipart/form-data">


                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Judul</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" value="<?= $dta['judul'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Judul Informasi" name="judul" id="judul">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control autogrow" id="deskripsi" required name="deskripsi" placeholder="Deskripsi" style="overflow: hidden; overflow-wrap: break-word; resize: vertikal; height: 104px; width: 558px;"><?= $dta['pesan'] ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Foto</label>
                                                            <div class="col-sm-10 bootstrap-filestyle">
                                                                <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto_edit" id="foto_edit">
                                                                <div class="row text-info" id="viewProgress" hidden="">
                                                                    <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Cakupan Tayangan</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" name="cakupan" id="cakupan" required="">
                                                                    <?php
                                                                    if ($dta['cakupan'] == "Semua") {
                                                                        echo "<option selected='selected' value='Semua'>Semua</option>
                                                                        <option value='Mahasiswa'>Mahasiswa</option>
                                                                        <option value='Recruiter'>Recruiter</option>";
                                                                    } else if ($dta['cakupan'] == "Mahasiswa") {
                                                                        echo "<option value='Semua'>Semua</option>
                                                                        <option selected value='Mahasiswa'>Mahasiswa</option>
                                                                        <option value='Recruiter'>Recruiter</option>";
                                                                    } else {
                                                                        echo "<option value='Semua'>Semua</option>
                                                                        <option value='Mahasiswa'>Mahasiswa</option>
                                                                        <option selected value='Recruiter'>Recruiter</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Status</label>
                                                            <div class="col-sm-10">
                                                                <select name="status" id="status" class="form-control">
                                                                    <?php
                                                                    if ($dta['status'] == "Active") {
                                                                        echo "<option selected='selected' value='Active'>Tayang</option>
                                                                        <option value='Inactive'>Tidak Tayang</option>";
                                                                    } else {
                                                                        echo "<option value='Active'>Tayang</option>
                                                                        <option selected='selected' value='Inactive'>Tidak Tayang</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <input type="hidden" name="foto_now" value="<?= $dta['gambar'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="submit_edit_informasi" class="btn btn-default waves-effect">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL EDIT INFORMASI -->

                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-inverse">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Informasi</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Informasi ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-informasi.php?hapus_informasi=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                <?php $i = $i + 1;
                                } ?>

                                <!-- <tr>
                                    <td style="text-align: center;">
                                        <img src="../assets/images/small/img4.jpg" alt="image" class="thumb-sm ">
                                    </td>
                                    <td>Pengumuman Tentang Pendaftaran Ulang Mahasiswa Baru TA 2023</td>
                                    <td><span class="label label-danger"> Private </span></td>
                                    <td>Muhammad Azwar Bahar</td>
                                    <td>17 September 2022</td>
                                    <td style="text-align: center;">
                                        <a href="mahasiswa-detail.php" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
                                        <a href="#" class="btn table-action-btn waves-effect waves-light"><i class="md md-edit"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        <img src="../assets/images/small/img4.jpg" alt="image" class="thumb-sm ">
                                    </td>
                                    <td>Akreditasi Terbaru Kampus UIN ALauddin MAkassar</td>
                                    <td><span class="label label-success"> Public </span></td>
                                    <td>Muhammad Azwar Bahar</td>
                                    <td>17 September 2022</td>
                                    <td style="text-align: center;">
                                        <a href="mahasiswa-detail.php" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
                                        <a href="#" class="btn table-action-btn waves-effect waves-light"><i class="md md-edit"></i></a>
                                    </td>
                                </tr> -->
                            </tbody>
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