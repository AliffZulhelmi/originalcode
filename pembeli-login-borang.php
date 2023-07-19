<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php
include ('header.php');
?>

<!-- Tajuk antaramuka log masuk pembeli -->
<h3>Login Pembeli</h3>

<!-- borang daftar masuk (login/sign in) pembeli -->
<form action='pembeli-login-proses.php' method='POST'>

    Nokp Pembeli <input type='text' name='nokp' requirement><br>
    Katalaluan <input type='password' name='katalaluan' requirement><br>
               <input type='submit' value='Login'>
</form>
<?php include ('footer.php'); ?>