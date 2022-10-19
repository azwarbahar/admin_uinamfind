<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT LEMBAGA
if (isset($_POST['submit_tambah_lembaga'])) {
    $nama = $_POST['nama'];
    $cakupan = $_POST['cakupan'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    // $tahun_berdiri = $_POST['tahun_berdiri'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];
    if ($deskripsi == "") {
        $deskripsi = "Ini adalah akun official resmi " . $nama;
    }
    $admin = $_POST['admin'];

    // TAMBAH DATA
    $query = "INSERT INTO `tb_lembaga_kampus` (`nama`, `cakupan_lembaga`, `fakultas`, `jurusan`, `deskripsi`,
                                            `admin`, `status`)
                                            VALUES ('$nama', '$cakupan', '$fakultas', '$jurusan', '$deskripsi', 
                                            '$admin', '$status');";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Lembaga Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../lembaga.php';
                });
            });
        </script>
<?php }
}


?>