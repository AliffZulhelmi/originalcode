<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php
include ('header.php');

?>

<!-- Tajuk antaramuka -->
<h3> Pendaftaran pembeli baru </h3>

<!-- Borang Pendaftaran staff baru -->
<form action = 'pembeli-signup-proses.php' method = 'POST'>

    Nama Pembeli <input type = 'text' name = 'nama' required> <br>
    NoKp Pembeli <input type = 'text' name = 'nokp' required> <br>
    Katalaluan <input type = 'password' name = 'katalaluan' required> <br>
                <input type = 'submit' value='Daftar'>
</form>
<?php include ('footer.php'); ?>