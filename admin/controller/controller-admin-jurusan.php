<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT SUPER ADMIN
if (isset($_POST['submit_tambah_admin'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jurusan = $_POST['jurusan'];
    $fakultas = $_POST['fakultas'];
    $email = $_POST['email'];
    $default_password = "Adminuinamfind123";
    $password = password_hash($default_password, PASSWORD_DEFAULT);
    $status = "Active";

    // SET FOTO
    $foto = $_FILES['foto']['name'];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $nama_foto = "image_" . time() . "." . $ext;
    $file_tmp = $_FILES['foto']['tmp_name'];


    // TAMBAH DATA
    $query = "INSERT INTO tb_admin_jurusan VALUES (NULL, '$nama', '$jabatan', '$fakultas', '$jurusan', '$email', '$password', '$nama_foto', '$status', NULL, NULL)";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        move_uploaded_file($file_tmp, '../../assets/images/admin/' . $nama_foto);
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Admin Jurusan Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../admin-jurusan.php';
                });
            });
        </script>
    <?php }
}

// UPDATE ADMIN
if (isset($_POST['edit_admin'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $jurusan = $_POST['jurusan'];
    $getJurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE id = '$jurusan'");
    $get_data_jurusan = mysqli_fetch_assoc($getJurusan);
    $fakultas = $get_data_jurusan['fakultas'];
    $nama_jurusan = $get_data_jurusan['jurusan'];

    $email = $_POST['email'];
    $status = $_POST['status'];

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
        move_uploaded_file($file_tmp, '../../assets/images/admin/' . $nama_foto);
    } else {
        $nama_foto = $_POST['foto_now'];
    }
    $query = "UPDATE tb_admin_jurusan SET nama = '$nama',
											jabatan = '$jabatan',
											fakultas = '$fakultas',
											jurusan = '$nama_jurusan',
											email = '$email',
											foto = '$nama_foto',
											status = '$status' WHERE id = '$id'";
    mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Admin Jurusan berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../admin-jurusan.php';
                });
            });
        </script>
    <?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_admin'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_admin_jurusan WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Admin Jurusan berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../admin-jurusan.php';
                });
            });
        </script>
<?php }
}

?>