<?php
# Memulakan fungsi session
session_start();

# Menyemak kewujudan data POST
if(!empty($_POST))
{
    include ('connection.php');

    # Arahan SQL(query) untuk menyimpan data jenama baru
    $sql_simpan = "insert into jenama
    (kod_jenama, jenama_barang)
    values
    ('".$_POST['kod_jenama']."', '".$_POST['jenama_barang']."') ";

    # Melaksanakan arahan SQL
    $laksana_query = mysqli_query($condb,$sql_simpan);

    # Menyemak jika laksana arahan berjaya
    if($laksana_query)
    {
        # Jenama berjaya disimpan
        die("<script>alert('Pendaftaran Berjaya.');
        window.location.href='barang-daftar-borang.php'; </script>");
    }
    else
    {
        # Jenama gagal disimpan
        die("<script>alert('Pendaftaran Gagal');
        window.history.back();</script>");
    }
}
else
{
    # Data POST tidak wujud
    die("<script>alert('Sila lengkapkan maklumat');
    window.location.href='barang-jenama-borang.php'; </script>");
}
?>