<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php
include ('header.php');
include ('connection.php');
include ('guard-staff.php');
?>

<!-- Tajuk antaramuka -->
<h3> Pendaftaran Barangan Baru </h3>

<!-- Borang Pendaftaran barang baru -->
<form action= 'barang-daftar-proses.php' method = 'POST'
enctype='multipart/form-data'>

    Nama barang <input type='text' name ='nama' required> <br>
    Jenama <select name='kod_jenama' required>
                <option selected disabled>Sila pilih jenama</option>

<?php
$sql_jenama = "select * from jenama order by jenama_barang";
$laksana_carian = mysqli_query($condb,$sql_jenama);
while($m=mysqli_fetch_array($laksana_carian))
    {
        echo "<option value='".$m['kod_jenama']."'>".$m['jenama_barang']."</option>";
    }

    ?>
                </select>
                <a href='barang-jenama-borang.php'>[+]Jenama</a><br>
    Harga       <input type='text' name='harga' required> <br>
    Ciri        <input type='text' name='ciri' required> <br>
    Gambar      <input type='file' name='gambar' required> <br>
                <input type='submit' value='Daftar'>
</form>
<?php include ('footer.php');?>