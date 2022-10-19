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
if (isset($_POST['submit_tambah_perusahaan'])) {
    $nama = $_POST['nama'];
    $industri = $_POST['industri'];
    $ukuran_kariawan = $_POST['ukuran_kariawan'];
    $deskripsi = $_POST['deskripsi'];
    if ($deskripsi == "") {
        $deskripsi = "Ini adalah akun official resmi " . $nama;
    }
    $url_profil = $_POST['url_profil'];
    $admin = $_POST['admin'];
    $status = "Active";

    // TAMBAH DATA
    $query = "INSERT INTO `tb_perusahaan` (`nama`, `url_profil`, `industri`, `ukuran_kariawan`, `deskripsi`, `recruiter_id`, `status`)
                                            VALUES ('$nama', '$url_profil', '$industri', '$ukuran_kariawan', '$deskripsi', '$admin', '$status');";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Perusahaan Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../perusahaan.php';
                });
            });
        </script>
<?php }
}




?>