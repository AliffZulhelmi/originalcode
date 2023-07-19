<?php 

# Menyemak nilai pembolehubah session ['tahap']
if(empty($_SESSION))
{
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
elseif($_SESSION['tahap'] != "staff")
{
    # Jika nilainya tidak sama dengan staff. aturcara akan dihentikan
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
?>