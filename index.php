<?php
#Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');
?>

<hr>
<h3>Tawaran Telefon Bimbit Termurah</h3>
<?php
# arahan SQL untuk memaparkan secara rawak
# 10 barangan yang ada dalam pangkalan data
$sql_pilihan = "
SELECT* FROM barang, jenama
WHERE barang.kod_jenama = jenama.kod_jenama
group by barang.nama_barang
ORDER BY rand() limit 5 ";

# melaksanakan arahan sql_pilihan
$laksana_pilihan = mysqli_query($condb,$sql_pilihan);

# jika tiada data yang dijumpai
if(mysqli_num_rows($laksana_pilihan)==0){

    # papar Tiada barangan yang telah direkodkan
    echo "Tiada barangan yang direkodkan";
}
else{
    echo "<hr>";
    #jika terdapat barangan yang ditemui
    #papar dalam bentuk jadual.
    echo "<table border='1'>";

    #Pembolehubah $n mengambil data yang ditemui
    while($n=mysqli_fetch_array($laksana_pilihan)){
        # memaparkan semula data diambil oleh pembolehubah $n
        echo " <tr>
		<td style='width: 200px;'>
    			<img src='img/".$n['gambar']."' style='width: 100%; height: auto;'>
		</td>
                  <td>
                      <b> ".$n['jenama_barang']."</b><br>
                          ".$n['nama_barang']." <br>
                          ".$n['ciri']." <br>
                          RM ".$n['harga']."
                  </td>
                </tr>";
    }
    echo "</table>";
}
?>
<?php include ('footer.php'); ?>