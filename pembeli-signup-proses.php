<?php
# Memulakan fungsi session
session_start();

# Menyemak kewujudan data post
if(!empty($_POST))
{
    include ('connection.php');

    # Data validation : had atas had bawah
    if(strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
    {
        die ("<script>alert ('Ralat Pada No Kad Pengenalan');
        window.location.href='pembeli-signup-borang.php';</script>");
    }

    # Arahan SQL untuk menyimpan data pembeli baru
    $sql_simpan = "insert into pembeli
    (nama_pembeli, nokp_pembeli, katalaluan_pembeli)
    values
    ('".$_POST['nama']."', '".$_POST['nokp']."', '".$_POST['katalaluan']."') ";

    # Melaksanakan arahan simpan data pembeli baru
    $laksana_query = mysqli_query($condb,$sql_simpan);

    # Menyemak jika proses menyimpan data berjaya atau tidak
    if($laksana_query)
    {
        # Jika berjaya papar popup dan buka fail index.php
        echo "<script>alert('Pendaftaran Berjaya.');
        window.location.href='index.php'; </script>";
    }
    else
    {
        # Jika gagal papar popup dan buka fail pembeli-signup-borang.php
        echo "<script>alert('Pendaftaran Gagal');
        window.location.href='pembeli-signup-borang.php';</script>";
    }
}
else
{
    # Jika pengguna membuka fail ini tanpa mengisi data.
    # Minta pengguna isi data terlebih dahulu.
    echo"<script>alert('Sila lengkapkan maklumat');
    window.location.href='pembeli-signup-borang.php';</script>";
}
?>