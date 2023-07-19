<!-- tajuk sistem. Aakan dipaparkan disebelah atas -->
<h1>Phone to you</h1>
<p>Pilih anda disini. tapi nanti belilah di kedai kami</p>
<hr>

<!-- Bahagian Menu Asas.
     Menu terbahagi kepada 3 jenis iaitu
    1. Menu staff dimana staff dapat akses semua perkara
    2. Menu pembeli dimana pembeli hanya boleh memilih barangan tetapi pembeli perlu login dahulu
    3. Menu di laman utama - bagi pelawat yang tidak login pelawat tidak dapat memilih barangan
 -->
 <?PHP
 # Menu staff : dipaparkan sekiranya staff telah login
 if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == 'staff') 
 {
    echo "
    <a href='index.php'>Laman Utama</a>
    <a href='senarai-pembeli.php'>Senarai pembeli</a>
    <a href='senarai-staff.php'>Senarai staff</a>
    <a href='senarai-barang.php'>Senarai barang</a>
    <a href='logout.php'>Logout</a>
    <hr>";
 }
 # Menu pembeli : dipaparkan sekiranya pembeli telah login
 else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "pembeli")
 {
    echo "
    <a href='index.php'>Laman Utama</a>
    <a href='pembeli-pilih.php'>Perbandingan barang</a>
    <a href='logout.php'>Logout</a>
    <hr>";
 }
 else {
   #menu Laman Utama : dipaparkan sekiranya staff atau pembeli tidak login
   echo "
    <a href='index.php'>Laman Utama</a>
    <a href='pembeli-signup-borang.php'>Pengguna Baru</a>
    <a href='pembeli-login-borang.php'>Login Pengguna</a>
    <a href='staff-login-borang.php'>Login Staff</a>
    <hr>";
 }
 ?>