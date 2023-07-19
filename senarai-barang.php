<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php, guard-staff, connection
include ('header.php');
include ('guard-staff.php');
include ('connection.php');

?>
<h3> Senarai barang </h3>
<!-- Bahagian 1 : memaparkan borang untuk memilih jenama -->
<form action='' method='POST'>

<select name='jenama'>
    <option selected disabled> Sila pilih jenama</option>
    <?php
        $sql_jenama = "select * from jenama order by jenama_barang";
        $laksana_carian = mysqli_query($condb,$sql_jenama);
        while($m=mysqli_fetch_array($laksana_carian)){
            echo "<option value='".$m['jenama_barang']."'>".$m['jenama_barang']."</option>";
        }
    ?>
</select>

    </select> <input type='submit' value='Papar'>

</form>
|<a href='barang-daftar-borang.php'>Daftar Barang Baru</a>|

<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
<?php include ('butang-saiz.php'); ?>

<!-- Header bagi jadual untuk memaparkan senarai barang --> 
<table border='1' id='saiz'>

<?php

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai barang
$tambahan="";
if(!empty($_POST['jenama']))
{
    $tambahan= "and jenama.jenama_barang = '".$_POST['jenama']."'";
}
# Arahan query untuk mencari senarai nama barang dan susun menaik mengikut harga
$arahan_papar="select * from barang, jenama, staff
WHERE
        barang.kod_jenama = jenama.kod_jenama
and     barang.nokp_staff = staff.nokp_staff
    $tambahan
ORDER BY barang.kod_barang DESC ";

# Laksanakan arahan mencari data barang
$laksana = mysqli_query($condb,$arahan_papar);

if(mysqli_num_rows($laksana)<=0){
    echo "<br>Tiada data ditemui";
}

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # Umpukkan data kepada tatasusunan bagi tujuan kemaskini barang
        $data_get=array(
            'nama_barang' => $m['nama_barang'],
            'jenama_barang' => $m['jenama_barang'],
            'harga' => $m['harga'],
            'ciri' => $m['ciri'],
            'gambar' => $m['gambar'],
            'kod_barang' => $m['kod_barang']
        );

# Memaparkan senarai dalam jadual
echo " <tr>
	<td style='width: 200px;'>
    		<img src='img/".$m['gambar']."' style='width: 100%; height: auto;'>
	</td>
       <td>
       <b> Jenama        : ".$m['jenama_barang']."</b><br>
           Nama Telefon  : ".$m['nama_barang']."</br>
           Ciri          : ".$m['ciri']." <br>
           Harga         : ".$m['harga']."<br>
           Didaftar Oleh : ".$m['nama_staff'];
        
        # Memaparkan navigasi untuk kemaskini dan hapus data barang
        echo "<br>

|<a href='barang-kemaskini-borang.php?".http_build_query($data_get)."'>
Kemaskini harga</a>

|<a href='barang-padam-proses.php?kod=".$m['kod_barang']."'
onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
Hapus</a>|
          
</td>
</tr>";

    }
?>
</table>
<?php include ('footer.php'); ?>