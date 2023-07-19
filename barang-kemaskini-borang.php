<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php
include ('header.php');
include ('connection.php');
include ('guard-staff.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-barang
if(empty($_GET)) {
    die("<script>window.location.href='senarai-barang.php';</script>");
}
?>

<h3> Kemaskini Data Barang</h3>
<!-- 
    Borang yang akan digunakan untuk menukar maklumat barang.
    Pada setiap input pengguna akan diumpukan kepada value
    yang akan diambil dari data GET yang telah dihantar dari
    fail senarai-barang.php
-->

<form action='barang-kemaskini-proses.php?kod_barang_lama=<?= $_GET['kod_barang'] ?>' method='POST'>

<img src='img/<?= $_GET['gambar'] ?>' width='10%'> <br>
Jenama Barang : <?= $_GET['jenama_barang'] ?> <br>
Nama Barang   : <?= $_GET['nama_barang'] ?> <br>
Ciri        : <?= $_GET['ciri'] ?> <br>

Harga
<input type='text' name='harga' value='<?= $_GET['harga'] ?>' required> <br>

<input type='submit' value='Kemaskini'>

</form>
<?php include ('footer.php'); ?>