<?php
# Memulakan fungsi session
session_start();

# Menyemak kewujudan data post yang dihantar dari staff-login-borang.php
if(!empty($_POST['nokp']) and !empty($_POST['katalaluan']))
{
    # Memanggil fail connection.php
    include ('connection.php');

    # Arahan SQL (query) untuk membandingkan data yang dimasukkan
    # Wujud di pangkalan data atau tidak
    $query_login = "select * from staff
    where
            nokp_staff = '".$_POST['nokp']."'
    and     katalaluan_staff = '".$_POST['katalaluan']."' ";

    # Melaksanakan arahan membandingkan data
    $laksana_query = mysqli_query($condb,$query_login);

    # Jika terdapat 1 data yang sepadan, login berjaya
    if(mysqli_num_rows($laksana_query)==1)
    {
        # Mengambil data yang ditemui
        $m = mysqli_fetch_array($laksana_query);

        # Mengumpukkan kepada pembolehubah session
        $_SESSION['nokp'] = $m['nokp_staff'];
        $_SESSION['tahap'] = "staff";

        # Membukan laman index.php
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        # Login gagal. Kembali ke laman staff-login-borang.php
        die("<script>alert('Login Gagal')
        window.location.href='staff-login-borang.php';</script>");
    }

}
else
{
    # Data yang dihantar dari laman staff-login-borang.php kosong
    die("<script>alert('Sila masukkan nokp dan katalaluan');
    window.location.href='staff-login-borang.php';</script>");
}
?>