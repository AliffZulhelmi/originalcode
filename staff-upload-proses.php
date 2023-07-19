<?php
if (isset($_POST['btn-upload']))
{
    # Memanggil fail connection
    include ('connection.php');
    
    # Mengambil nama sementara fail
    $namafailsementara=$_FILES["data_staff"]["tmp_name"];

    # Mengambil masa fail
    $namafail=$_FILES['data_staff']['name'];

    # Mengambil jenis fail
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);

    # Menguji jenis fail dan sail fail
        if($_FILES["data_staff"]["size"]>0 AND $jenisfail=="txt")
        {
            # Membuka fail yang diambil
            $fail_data_staff=fopen($namafailsementara,"r");

            #Mendapatkan data dari fail baris demi baris
            while (!feof($fail_data_staff))
            {
                # Mengambil data sebaris sahaja bagi setiap pusingan
                $ambilbarisdata = fgets($fail_data_staff);

                #Memecahkan baris data mengikut tanda pipe
                $pecahkanbaris = explode("|",$ambilbarisdata);

                # Selepas pecahan tadi akan diumpukan kepada 3
                list($nokp_staff,$nama_staff,$katalaluan_staff) = $pecahkanbaris;

                # Arahan SQL untuk menyimpan data
                $arahan_sql_simpan="insert into staff
                (nokp_staff,nama_staff,katalaluan_staff) values
                ('$nokp_staff','$nama_staff','$katalaluan_staff')";

                # Memasukkan data kedalam jadual staff
                $laksana_arahan_simpan=mysqli_query($condb, $arahan_sql_simpan);
                echo"<script>alert('Import fail data Selesai');
                window.location.href='senarai-staff.php'; </script>";
        }
        fclose($fail_data_staff);
    }
    else
    {
        echo "<script>alert('Hanya fail berformat txt sahaja dibenarkan');</script> ";
    }
}
else
{
    die("<script>alert('Ralat! Akses secara terus');
    window.location.href='staff-upload-borang.php';</script>");
}
?>