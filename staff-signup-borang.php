<?php
# Memulakan fungsi SESSION
session_start();

#Memanggil fail header.php dan guard-staff.php
include ('header.php');
include ('guard-staff.php');
?>

<!-- Tajuk antaramuka -->
<h3> Pendaftaran staff Baru </h3>

<!-- Borang Pendaftaran staff baru -->
<form action= 'staff-signup-proses.php' method = 'POST'>

    Nama staff <input type = 'text' name = 'nama' required> <br>
    NoKp staff <input type = 'text' name = 'nokp' required> <br>
    Katalaluan <input type = 'password' name = 'katalaluan' required> <br>
               <input type = 'submit' value='Daftar'>
</form>
<?php include ('footer.php');?>