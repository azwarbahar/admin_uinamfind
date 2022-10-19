<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT INFORMASI
if (isset($_POST['submit_tambah_informasi'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $cakupan = $_POST['cakupan'];
    $admin_id = $_POST['admin_id'];
    $status = "Active";
    $slug = slugify($judul);

    // SET FOTO
    $foto = $_FILES['foto']['name'];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $nama_foto = "image_" . time() . "." . $ext;
    $file_tmp = $_FILES['foto']['tmp_name'];


    // TAMBAH DATA
    $query = "INSERT INTO `tb_informasi` (`judul`, `cakupan`, `pesan`, `penulis_id`, `gambar`,
                                            `slug`, `status`)
                                            VALUES ('$judul', '$cakupan', '$deskripsi', '$admin_id', '$nama_foto', 
                                            '$slug', '$status');";


    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        $from_id = mysqli_insert_id($conn);
        // TAMBAH DATA FOTO
        $query_foto = "INSERT INTO `tb_foto` (`judul`, `deskripsi`, `nama_foto`, `kategori`, `from_id`, `uploader_id`)
                                            VALUES ('$judul', '$deskripsi', '$nama_foto', 'Informasi', '$from_id', '$admin_id');";
        mysqli_query($conn, $query_foto);
        move_uploaded_file($file_tmp, '../../assets/images/informasi/' . $nama_foto);
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Informasi Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../informasi.php';
                });
            });
        </script>
    <?php }
}

// UPDATE INFORMASI
if (isset($_POST['submit_edit_informasi'])) {

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $cakupan = $_POST['cakupan'];
    $status = $_POST['status'];
    $slug = slugify($judul);

    // SET FOTO
    if ($_FILES['foto_edit']['name'] != '') {
        $foto = $_FILES['foto_edit']['name'];
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
        $nama_foto = "image_" . time() . "." . $ext;
        $file_tmp = $_FILES['foto_edit']['tmp_name'];
        // HAPUS OLD FOTO
        $target = "foto/" . $_POST['foto_now'];
        if (file_exists($target) && $_POST['foto_now'] != 'default.png') unlink($target);
        // UPLOAD NEW FOTO
        move_uploaded_file($file_tmp, '../../assets/images/informasi/' . $nama_foto);
    } else {
        $nama_foto = $_POST['foto_now'];
    }
    $query = "UPDATE tb_informasi SET judul = '$judul',
											cakupan = '$cakupan',
											pesan = '$deskripsi',
											gambar = '$nama_foto',
											slug = '$slug',
											status = '$status',
                                            updated_at = NULL WHERE id = '$id'";
    mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Informasi berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../informasi.php';
                });
            });
        </script>
    <?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_informasi'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_informasi WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Informasi berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../informasi.php';
                });
            });
        </script>
<?php }
}

?>