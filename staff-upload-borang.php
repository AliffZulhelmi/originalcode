<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header, guard-staff
include ('header.php');
include ('guard-staff.php');
?>

<!-- Tajuk laman -->
<h3> Muat Naik Data staff (*.txt)</h3>

<!-- Borang untuk memuat naik fail -->
<form action='staff-upload-proses.php' method='POST' enctype='multipart/form-data'>
    
    <h3><b>Sila Pilih Fail txt yang ingin diupload</b></h3>
    <input type='file' name='data_staff'>
    <button type='submit' name='btn-upload'>Muat Naik</button>

</form>
<?php include ('footer.php'); ?>