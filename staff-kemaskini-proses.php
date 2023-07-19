<?php
# Memulakan fungsi session
session_start();

# Memanggil fail guard-staff.php
include ('guard-staff.php');

# Menyemak kewujudan data POST
if(!empty($_POST))
{
    # Memanggil fail connection.php
    include('connection.php');

    # Pengeshana data (validation) nokp staff
    if(strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
    {
        die("<script>alert('Ralat Nokp'); 
        window.history.back();</script>");
    }

    # Arahan SQL (query) untuk kemaskini maklumat staff
    $arahan = "update staff set 
    nama_staff = '".$_POST['nama']."',
    nokp_staff = '".$_POST['nokp']."',
    katalaluan_staff = '".$_POST['katalaluan']."'
    where
    nokp_staff = '".$_GET['nokp_lama']."' ";

    # Melaksana dan menyemak proses kemaskini
    if(mysqli_query($condb,$arahan))
    {
        # Kemaskini berjaya
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='senarai-staff.php'; </script>";
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
    # Jika data GET tidak wujud. Kembali ke fail senarai-staff.php
    die("<script>alert('sila lengkapkan data');
    window.location.href='senarai-staff.php';</script>");
}
?>