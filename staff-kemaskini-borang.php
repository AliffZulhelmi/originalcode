<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail guard-staff.php
include ('header.php');
include ('guard-staff.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-staff
if(empty($_GET)) {
    die("<script>window.location.href='senarai-staff.php';</script>");
}
?>

<h3>Kemaskini staff baru </h3>
<!-- 
    Borang yang akan digunakan untuk menukar matlumat staff.
    Pada setiap input pengguna akan diumpukan dengan value
    yang akan diambil dari data GET yang telah dihantar dari 
    fail senarai-staff.php
-->
<form action='staff-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'>
nama
<input type='text' name='nama' value='<?= $_GET['nama'] ?>' required><br>

nokp
<input type='text' name='nokp' value='<?= $_GET['nokp'] ?>' required><br>

katalaluan
<input type='text' name='katalaluan' value='<?= $_GET['katalaluan'] ?>' required><br>

<input type='submit' value='Kemaskini'>

</form>
<?php include ('footer.php'); ?>