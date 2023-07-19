<?php
# Memulakan fungsi session
session_start();

# Memanggil fail guard-staff.php
include ('guard-staff.php');

# Menyemak kewujudan data GET kod barang
if(!empty($_GET))
{
    # Memanggil fail connection.php
    include ('connection.php');

    # Arahan untuk memadam data barang berdasarkan kod yang dihantar
    $arahan = "delete from barang where kod_barang='".$_GET['kod']."'";

    # Melaksanakan arahan dan menguji proses padam rekod
    if(mysqli_query($condb,$arahan))
    {
        # Jika data berjaya dipadam
        echo "<script>alert('Padam data Berjaya');
        window.location.href='senarai-barang.php';</script>";
    }
    else
    {
        # Jika data gagal dipadam
        echo "<script>alert('Padam data gagal');
        window.location.href='senarai-barang.php';</script>";
    }
}
else
{
    # Jika data GET tidak wujud (empty)
    die("<script>alert('Ralat! akses secara terus');
    window.location.href='senarai-barang.php';</script>");
}
?>