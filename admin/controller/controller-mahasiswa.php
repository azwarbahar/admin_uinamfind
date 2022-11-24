<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT MAHASISWA
if (isset($_POST['submit_tambah_mahasiswa'])) {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $nim = $_POST['nim'];
    $username = $nim;
    $email_uinam = $nim . "@uin-alauddin.ac.id";
    $password = password_hash($username, PASSWORD_DEFAULT);
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $foto = "photo_default.png";
    $status_kemahasiswaan = $_POST['status_kemahasiswaan'];

    // TAMBAH DATA
    $query = "INSERT INTO `tb_user` (`nama_depan`, `nama_belakang`, `nim`, `username`, `email_uinam`,
                                            `password`, `fakultas`, `jurusan`, `tahun_masuk`, `foto`, `status_kemahasiswaan`)
                                            VALUES ('$nama_depan', '$nama_belakang', '$nim', '$username', '$email_uinam', 
                                            '$password', '$fakultas', '$jurusan', '$tahun_masuk', '$foto', '$status_kemahasiswaan');";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        $id = mysqli_insert_id($conn);
        $motto_profesional = "Mahasiswa di UIN Alauddin Makassar";

        // TAMBAH DATA
        $query = "INSERT INTO `tb_motto_user` (`motto_profesional`, `user_id`)
                                                VALUES ('$motto_profesional', '$id');";

        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Mahasiswa Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../mahasiswa.php';
                });
            });
        </script>
    <?php }
}



// RESET PASSWORD MAHASISWA
if (isset($_GET['reset_pass_mhs'])) {

    $id = $_GET['id'];
    $password_text = "Uinamfind12345";
    $password = password_hash($password_text, PASSWORD_DEFAULT);

    $query = "UPDATE tb_user SET password = '$password' WHERE id = '$id'";
    mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Berhasil Mereset password akun',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../mahasiswa-detail.php?id=<?= $id ?>';
                });
            });
        </script>
    <?php }
}


// BANNED MAHASISWA
if (isset($_GET['ban_mhs'])) {

    $id = $_GET['id'];
    $status_akun = $_GET['status_akun'];
    $send_status = "";
    if ($status_akun == "Active") {
        $send_status = "Banned";
    } else {
        $send_status = "Active";
    }

    $query = "UPDATE tb_user SET status_akun = '$send_status' WHERE id = '$id'";
    mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Success Banned akun',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../mahasiswa-detail.php?id=<?= $id ?>';
                });
            });
        </script>
<?php }
}


?>