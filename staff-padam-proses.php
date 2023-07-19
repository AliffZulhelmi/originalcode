<?php
# Memulakan fungsi session
session_start();

# Memanggil fail guard-staff.php
include ('guard-staff.php');

# Menyemak kewujudan data GET nokp staff
if(!empty($_GET))
{
    # Memanggil fail connection.php
    include ('connection.php');

    # Arahan SQL untuk memadam data staff berdasarkan nokp yang dihantar
    $arahan = "delete from staff where nokp_staff='".$_GET['nokp']."'";

    #Melaksanakan arahan SQL padam data dan menguji proses padam data
    if(mysqli_query($condb,$arahan))
    {
        # Jika data berjaya dipadam
        echo "<script>alert('Padam data Berjaya');
        window.location.href='senarai-staff.php'; </script>";
    }
    else
    {
        # Jika data gagal dipadam
        echo "<script>alert('Padam data gagal');
        window.location.href='senarai-staff.php'; </script>";
    }
}
else
{
    # Jika data GET tidak wujud (empty)
    die("<script>alert('Ralat! akses secara terus');
    window.location.href='senarai-staff.php';</script>");
}
?>