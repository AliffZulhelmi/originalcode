<?php 
# Memulakan fungsi session
session_start();

# Menyemak kuwujudan data post
if(!empty($_POST))
{
    # Memanggil fail connection
    include ('connection.php');

    # Data validation : harga barang tidak boleh kurang atau sama dengan dengan RM0
    if($_POST['harga'] <=0)
    {
        die("<script>alert('Ralat Pada Harga');
        window.history.back();</script>");
    }

    # Memproses maklumat gambar yang di upload
    # Proses ini lebih kepada menukar nama fail gambar
    $timestmp = date("Y-m-d-His");
    $nama_fail = basename($_FILES["gambar"]["name"]);
    $format_gambar = pathinfo($nama_fail,PATHINFO_EXTENSION);
    $lokasi = $_FILES['gambar']['tmp_name'];
    $nama_baru = $timestmp.".".$format_gambar;

    # Arahan query untuk menyimpan data barang baru
    $sql_simpan = "insert into barang 
    (nama_barang, kod_jenama, harga, ciri, gambar, nokp_staff) values
    ( '".$_POST['nama']."', '".$_POST['kod_jenama']."', '".$_POST['harga']."',
      '".$_POST['ciri']."', '$nama_baru', '".$_SESSION['nokp']."' ) ";

    # Melaksanakan arahan SQL menyimpan data barang baru
    $laksana_sql = mysqli_query($condb,$sql_simpan);

    # Menyemak proses melaksanakan berjaya atau tidak
    if($laksana_sql)
    {
        # Muat naik gambar
        move_uploaded_file($lokasi, "img/".$nama_baru);

        # Jika bertanya kembali fail senarai-borang.php
        die("<script>alert('Pendaftaran Berjaya.');
        window.location.href='senarai-barang.php'; </script>");
    }
    else
    {
        # Jika gagal
        die("<script>alert('Pendaftaran Gagal');
        window.history.back();</script>");
    }

}
else
{
    # Jika maklumat barang di isi tidak lengkap
    die("<script>alert('Sila lengkapkan maklumat');
    window.location.href='barang-signup-borang.php';</script>");
}
?>