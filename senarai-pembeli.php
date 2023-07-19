<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail guard-staff.php
include('header.php');
include('connection.php');
include('guard-staff.php');
?>

<h3>Senarai pembeli</h3>
<!-- Borang carian nama pembeli -->
<form action='' method='POST'>
    Carian pembeli <br>
    Nama pembeli <input type='text' name='nama'>
                 <input type='submit' value='Cari'>
</form>

<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
<?php include('butang-saiz.php'); ?>
<!-- Header bagi jadual untuk memaparkan senarai pembeli -->
<table width='100%' border='1' id='saiz'>
    <tr>
        <td>Nama</td>
        <td>NoKP</td>
        <td>Katalaluan</td>
        <td>Tindakan</td>
    </tr>

<?php

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai pembeli
$tambahan="";
if(!empty($_POST['nama']))
{
    $tambahan= "where nama_pembeli like '%".$_POST['nama']."%'";
}

# Arahan query untuk mencari senarai nama pembeli
$arahan_papar="select* from pembeli $tambahan ";

# Laksanakan arahan mencari data pembeli
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # Memaparkan senarai nama dalam jadual
        echo"<tr>
        <td>".$m['nama_pembeli']."</td>
        <td>".$m['nokp_pembeli']."</td>
        <td>".$m['katalaluan_pembeli']."</td> ";

        #memaparkan navigasi untuk hapus data pembeli
        echo"<td>
        
        |<a href='pembeli-padam-proses.php?nokp=".$m['nokp_pembeli']."'
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        Hapus</a>|

        </td>
        </tr>";
    }
    ?>
    </table>
    <?php include ('footer.php'); ?>