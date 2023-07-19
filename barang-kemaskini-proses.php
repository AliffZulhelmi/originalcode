<?php
# Memulakan fungsi session
session_start();

# Memanggil fail guard-staff.php
include ('guard-staff.php');

# Menyemak kewujudan data POST
if(!empty($_POST))
{
    # Memanggil fail connection.php
    include ('connection.php');

    # Pengesahan data (validationc)
    if($_POST['harga'] <= 0)
    {
        die("<script>alert('Ralat Maklumat');
        window.history.back();</script>");
    }

    # Arahan SQL(query) untuk kemaskini maklumat barang
    $arahan = "update barang set
    harga = '".$_POST['harga']."',
    nokp_staff = '".$_SESSION['nokp']."'
    where
    kod_barang = '".$_GET['kod_barang_lama']."' ";

    # Melaksanakan dan menyemak proses kemaskini
    if(mysqli_query($condb,$arahan))
    {
        # Kemaskini berjaya
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='senarai-barang.php';</script>";
    }
    else
    {
        # Kemaskini gagal
        echo "<script>alert('Kemaskini Gagal');
        window.history.back();</script>";
    }
}
else
{
    # Data POST empty
    die("<script>alert('sila lengkapkan data');
    window.location.href='senarai-barang.php';</script>");
}
?>