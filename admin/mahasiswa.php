<?php
require_once '../template/header.php';

$mahasiswa = mysqli_query($conn, "SELECT * FROM tb_user_new WHERE status_akun = 'Active' ORDER BY id DESC");

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

                    <h4 class="page-title">Data Mahasiswa</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Master Data</a>
                        </li>
                        <li class="active">
                            Data Mahasiswa
                        </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">



                        <!-- MODAL TABAH MAHASISWA -->
                        <div id="con-close-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Mahasiswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-mahasiswa.php" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Nama Depan</label>
                                                        <input type="text" class="form-control" name="nama_depan" id="nama_depan" required="" placeholder="Nama Depan">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Nama Belakang</label>
                                                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">NIM</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="NIM" name="nim" id="nim">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Fakultas</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="fakultas" id="fakultas" required="">
                                                        <option value="">- Pilih -</option>
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
                                                <label class="col-sm-2 col-form-label">Jurusan</label>
                                                <div class="col-sm-10">
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
                                                <label class="col-sm-2 col-form-label">Tahun Masuk</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Tahun Masuk" name="tahun_masuk" id="tahun_masuk">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status Mahasiswa</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="status_kemahasiswaan" id="status_kemahasiswaan" required="">
                                                        <option> - Pilih -</option>
                                                        <option value="Lulus">Mahasiswa Aktif</option>
                                                        <option value="Belum Lulus">Alumni</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <input type="hidden" name="id_mitra" value="<?= $get_id_session ?>">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_mahasiswa" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH ADMIN -->

                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Fakultas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>

                                <?php $i = 1;
                                foreach ($mahasiswa as $dta) { ?>

                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="https://api.uinamfind.com/upload/photo/<?= $dta['foto'] ?>" alt="image" class="img-circle  thumb-sm ">
                                        </td>
                                        <td><?= $dta['nim'] ?></td>
                                        <td><?= $dta['nama_depan'] . ' ' . $dta['nama_belakang'] ?></td>
                                        <td><?= $dta['jurusan'] ?></td>
                                        <td><?= $dta['fakultas'] ?></td>
                                        <?php

                                        $status_kemahasiswaan = $dta['status_kemahasiswaan'];
                                        if ($status_kemahasiswaan == "Lulus") {
                                            echo "<td><span class='label label-inverse'> Alumni </span></td>";
                                        } else {
                                            echo "<td><span class='label label-default'> Mahasiswa Aktif </span></td>";
                                        }

                                        ?>

                                        <td style="text-align: center;">
                                            <a href="mahasiswa-detail.php?id=<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-visibility"></i></a>
                                            <!-- <a href="#" class="btn table-action-btn waves-effect waves-light"><i class="md md-edit"></i></a> -->
                                        </td>
                                    </tr>

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