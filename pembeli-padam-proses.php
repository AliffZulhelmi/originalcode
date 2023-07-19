<?php
# Memulakan fungsi session
session_start();

# Menyemak kewujudan data GET nokp pembeli
if(!empty($_GET))
{
    # Memanggil fail connection.php
    include('connection.php');

    # Arahan untuk memadam data pembeli berdasarkan nokp yang dihantar(GET)
    $arahan = "delete from pembeli where nokp_pembeli='".$_GET['nokp']."'";

    # Melaksanakan arahan dan menguji proses padam rekod
    if(mysqli_query($condb,$arahan))
    {
        # Jika data berjaya dipadam. Papar popup dan buka fail senarai-pembeli.php
        echo "<script>alert('Padam data Berjaya');
        window.location.href='senarai-pembeli.php'; </script>";
    }
}
else
{
    # Jika data GET tidak wujud (empty). Papar popup dan buka fail senarai-pembeli.php
    die("<script>alert('Ralat! Akses secara terus');
    window.location.href='senarai-pembeli.php';</script>");
}
?>