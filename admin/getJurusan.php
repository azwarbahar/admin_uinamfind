<?php
require_once '../koneksi.php';
$fak = $_POST['fak'];
$tampil = mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE fakultas='$fak'");
$jml = mysqli_num_rows($tampil);

if ($jml > 0) {
    while ($r = mysqli_fetch_array($tampil)) {
?>
        <option value="<?php echo $r['jurusan'] ?>"><?php echo $r['jurusan'] ?></option>
<?php
    }
} else {
    echo "<option selected>- Pilih Fakultas -</option>";
}

?>