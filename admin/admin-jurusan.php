<?php
require_once '../template/header.php';

$admin_jurusan = mysqli_query($conn, "SELECT * FROM tb_admin_jurusan");

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

                    <h4 class="page-title">Admin Jurusan</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Administrator</a>
                        </li>
                        <li class="active">
                            Admin Jurusan
                        </li>
                    </ol>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">



                        <!-- MODAL TABAH ADMIN -->
                        <div id="con-close-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Admin Jurusan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-admin-jurusan.php" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lengkap" name="nama" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Jabatan" name="jabatan" id="jabatan">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Fakultas</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="fakultas" id="fakultas" required="">
                                                        <option>- Pilih -</option>
                                                        <?php
                                                        $fakultas = mysqli_query($conn, "SELECT * FROM tb_fakultas");
                                                        while ($row = mysqli_fetch_assoc($fakultas)) {
                                                            echo "<option value='$row[nama]'>$row[nama]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jurusan</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="jurusan" id="jurusan" required="">
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $fakultas = mysqli_query($conn, "SELECT * FROM tb_fakultas");
                                                        while ($row = mysqli_fetch_assoc($fakultas)) {
                                                        ?>
                                                            <optgroup label="<?= $row['nama'] ?>">
                                                                <?php
                                                                $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE fakultas = '$row[nama]' ");
                                                                while ($row_jurusan = mysqli_fetch_assoc($jurusan)) {
                                                                ?>
                                                                    <option value="<?= $row_jurusan['jurusan'] ?>"><?= $row_jurusan['jurusan'] ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="nb-edt form-control" required="" autocomplete="off" placeholder="Email" name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Foto</label>
                                                <div class="col-sm-9 bootstrap-filestyle">
                                                    <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto" id="foto" required="">
                                                    <div class="row text-info" id="viewProgress" hidden="">
                                                        <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_admin" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH ADMIN -->

                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah Admin</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Jurusan</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>

                                <?php $i = 1;
                                foreach ($admin_jurusan as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="../assets/images/admin/<?= $dta['foto'] ?>" alt="image" class="img-circle  thumb-sm ">
                                        </td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><?= $dta['fakultas'] ?></td>
                                        <td><?= $dta['jurusan'] ?></td>
                                        <td><?= $dta['jabatan'] ?></td>
                                        <td><?= $dta['email'] ?></td>
                                        <td style="text-align: center;"><span class="label label-default"> <?= $dta['status'] ?> </span></td>
                                        <td style="text-align: center;">
                                            <a href="#" type="button" data-toggle="modal" data-target="#edit-<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-edit"></i></a>
                                            <a href="#" type="button" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>


                                    <!-- MODAL EDIT ADMIN -->
                                    <div id="edit-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Edit Teknisi</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="controller/controller-admin-jurusan.php" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['nama'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lengkap" name="nama" id="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Jabatan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['jabatan'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Jabatan" name="jabatan" id="jabatan">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Fakultas</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control select2" name="fakultas" id="fakultas" required="">
                                                                    <option value="">- Pilih -</option>
                                                                    <?php
                                                                    $fakultas = mysqli_query($conn, "SELECT * FROM tb_fakultas");

                                                                    $fakultas1 = $dta['fakultas'];
                                                                    while ($row = mysqli_fetch_assoc($fakultas)) {
                                                                        if ($row['nama'] == $fakultas1) {
                                                                            echo "<option selected value='$row[nama]'>$row[nama]</option>";
                                                                        } else {
                                                                            echo "<option value='$row[nama]'>$row[nama]</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Jurusan</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control select2" name="jurusan" id="jurusan" required="">
                                                                    <option value="">- Pilih -</option>
                                                                    <?php
                                                                    $fakultas = mysqli_query($conn, "SELECT * FROM tb_fakultas");
                                                                    while ($row = mysqli_fetch_assoc($fakultas)) {
                                                                    ?>
                                                                        <optgroup label="<?= $row['nama'] ?>">
                                                                        <?php
                                                                        $jurusan1 = $dta['jurusan'];
                                                                        $jurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE fakultas = '$row[nama]' ");
                                                                        while ($row_jurusan = mysqli_fetch_assoc($jurusan)) {

                                                                            if ($row_jurusan['jurusan'] == $jurusan1) {
                                                                                echo "<option value='$row_jurusan[jurusan]' selected > $row_jurusan[jurusan]</option>";
                                                                            } else {

                                                                                echo "<option value='$row_jurusan[jurusan]' > $row_jurusan[jurusan]</option>";
                                                                            }
                                                                        }
                                                                    }
                                                                        ?>
                                                                        </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" value="<?= $dta['email'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Email" name="email" id="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Foto</label>
                                                            <div class="col-sm-9 bootstrap-filestyle">
                                                                <input type="file" class="filestyle" data-placeholder="Belum ada foto" name="foto_edit" id="foto_edit">
                                                                <div class="row text-info" id="viewProgress" hidden="">
                                                                    <span class="col-sm-5">Sedang mengapload foto... <b><i id="progress">0%</i></b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Status Akun</label>
                                                            <div class="col-sm-9">
                                                                <select name="status" id="status" class="form-control">
                                                                    <?php
                                                                    if ($dta['status'] == "Active") {
                                                                        echo "<option selected='selected' value='Active'>Active</option>
                                                                        <option value='Inactive'>Inactive</option>";
                                                                    } else {
                                                                        echo "<option value='Active'>Active</option>
                                                                        <option selected='selected' value='Inactive'>Inactive</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <input type="hidden" name="foto_now" value="<?= $dta['foto'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="edit_admin" class="btn btn-default waves-effect">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL EDIT ADMIN -->

                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-inverse">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Admin</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Admin ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-admin-jurusan.php?hapus_admin=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
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
            </div>




            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>