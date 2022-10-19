<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// HAPUS PRODUK
if (isset($_GET['hapus_produk'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_market_produk WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Produk berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../market-produk.php';
                });
            });
        </script>
    <?php }
}


// HAPUS PRODUK DIGITAL
if (isset($_GET['hapus_produk_digital'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_market_digital WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Produk berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../market-digital.php';
                });
            });
        </script>
<?php }
}


?>