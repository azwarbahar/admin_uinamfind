<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT UKM
if (isset($_POST['submit_tambah_ukm'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];
    if ($deskripsi == "") {
        $deskripsi = "Ini adalah akun official resmi " . $nama;
    }
    $admin = $_POST['admin'];
    $status_konfirmasi = "Yes";

    // TAMBAH DATA
    $query = "INSERT INTO `tb_ukm` (`nama_ukm`, `kategori`, `deskripsi`, `status_konfirmasi`, `admin`, `status`)
                                            VALUES ('$nama', '$kategori', '$deskripsi', '$status_konfirmasi', 
                                            '$admin', '$status');";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data UKM Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../ukm.php';
                });
            });
        </script>
<?php }
}




?>