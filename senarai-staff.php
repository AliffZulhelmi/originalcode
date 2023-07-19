<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php, connection.php, dan guard-staff.php
include ('header.php');
include ('connection.php');
include ('guard-staff.php');
?>

<h3> Senarai staff</h3>

| <a href='staff-signup-borang.php'>Daftar Staff Baru</a>
| <a href='staff-upload-borang.php'>Muat Naik Staff</a>
|
<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
<?php include ('butang-saiz.php'); ?>
<!-- Header bagi jadual untuk memaparkan senarai staff -->
<table width='100%' border='1' id='saiz'>
    <tr>
        <td>Nama</td>
        <td>Nokp</td>
        <td>Katalaluan</td>
        <td>Tindakan</td>
    </tr>

<?php

# Arahan query untuk mencari senarai nama staff
$arahan_papar="select* from staff ";

# Laksanakan arahan mencari data staff
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # Umpukan data kepada tatasusunan bagi tujuan kemaskini staff
        $data_get=array(
            'nama' => $m['nama_staff'],
            'nokp' => $m['nokp_staff'],
            'katalaluan' => $m['katalaluan_staff']
        );

        # Memaparkan senarai nama dalam jadual
        echo" <tr>
        <td>".$m['nama_staff']."</td>
        <td>".$m['nokp_staff']."</td>
        <td>".$m['katalaluan_staff']."</td> ";

        #memaparkan navigasi untuk kemaskini dan hapus data staff
        echo"<td>
         <a href='staff-kemaskini-borang.php?".http_build_query($data_get)."'>
        Kemaskini</a>

        <a href='staff-padam-proses.php?nokp=" .$m['nokp_staff']."'
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        Hapus</a>

        </td>
        </tr>";
    }
?>
</table>
<?php include ('footer.php'); ?>