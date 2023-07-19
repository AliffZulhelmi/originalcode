<?php

# Memulakan fungsi session
session_start();

# Memanggil fail header.php
include('header.php');
?>

<!-- Tajuk antaramuka log masuk staff -->
<h3>Login staff</h3>

<!-- borang daftar masuk (log in/sign in) staff-->
<form action='staff-login-proses.php' method='POST'>

    Nokp staff <input type='text' name='nokp'><br>
    Katalaluan <input type='password' name='katalaluan'><br>
               <input type='submit' value='Login'>
</form>
<?php include ('footer.php'); ?>