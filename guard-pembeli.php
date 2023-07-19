<?php 

# Menyemak nilai pembolehubah session ['tahap']
if(empty($_SESSION))
{
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
elseif($_SESSION['tahap'] != "pembeli")
{
    # Jika nilainya tidak sama dengan pembeli. aturcara akan dihentikan
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
?>