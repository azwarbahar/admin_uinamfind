<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT MAGANG
if (isset($_POST['submit_tambah_magang'])) {
    $judul = $_POST['judul'];
    $instansi = $_POST['instansi'];
    $industri = $_POST['industri'];
    $tanggal_magang = $_POST['tanggal_magang'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    if ($deskripsi == "") {
        $deskripsi = "Ini adalah akun official resmi " . $nama;
    }
    $link_info = $_POST['link_info'];
    $admin_id = $_POST['admin_id'];
    $role_admin = $_POST['role_admin'];
    $status = "Active";
    $slug = slugify($judul);

    // SET FOTO
    $foto = $_FILES['foto']['name'];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $nama_foto = "image_" . time() . "." . $ext;
    $file_tmp = $_FILES['foto']['tmp_name'];


    // TAMBAH DATA
    $query = "INSERT INTO `tb_magang` (`judul`, `industri`, `instansi`, `deskripsi`, `foto`, `tanggal`, `lokasi`,
                                        `link_info`, `admin_id`, `role_admin`, `slug`, `status`)
                                VALUES ('$judul', '$industri', '$instansi', '$deskripsi', '$nama_foto',
                                        '$tanggal_magang', '$lokasi', '$link_info', '$admin_id', '$role_admin', '$slug', '$status');";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        move_uploaded_file($file_tmp, '../../assets/images/magang/' . $nama_foto);
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Magang Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../magang.php';
                });
            });
        </script>
    <?php }
}


// HAPUS MAGANG
if (isset($_GET['hapus_magang'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_magang WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Magang berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../magang.php';
                });
            });
        </script>
<?php }
}



?>