<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php, connection.php, dan guard-pembeli.php
include ('header.php');
include ('connection.php');
include ('guard-pembeli.php');
?>

<!-- 
    Memaparkan perkara yang boleh digunakan untuk
    membandingkan telefon bimbit samada harga, jenama
-->

<p> Carian Telefon Bimbit</p>
<!-- borang pemilihan -->
<form action="" method="POST">
    <table>
        <tr>
            <td> Julat Harga</td>
            <td><input type='text' name='harga'><i>dan</i></td>
        </tr>
        <tr>
            <td>Jenama</td>
        <td>
            <select name='jenama'>
                <option selected disabled>Sila pilih jenama</option>
                <?php
                    # Proses memaparkan senarai jenama yang ada di jadual jenama
                    # Dalam bentuk drop down list
                    $sql_jenama = "select * from jenama order by jenama_barang";

                    $laksana_carian = mysqli_query($condb,$sql_jenama);

                    while($m=mysqli_fetch_array($laksana_carian))
                    {
                        echo "<option value='".$m['jenama_barang']."'>".$m['jenama_barang']."</option>";
                    }
                ?>
            </select>
        <i>dan</i>
    </td>
</tr>

<tr>
    <td></td>
    <td><input type='submit' value='cari'></td>
</tr>
    </table>
</form>
<hr>
<?php
    # Memeriksa jika terdapat carian
    if(!empty($_POST['jenama']) or !empty($_POST['harga'])){
        $tambahan = " "; $carian=" ";

        # Jika carian harga tidak kosong
        if(!empty($_POST['harga'])){
            # Umpukan syarat SQL tambahan harga barang
            $tambahan = $tambahan." "." AND barang.harga <= ".$_POST['harga']."";
            $carian = $carian. "Harga : RM ".$_POST['harga']." ke bawah<br>";
        }

        echo "Carian mengikut<br>".$carian;

        # Arahan SQL (query) untuk memilih barang berdasarkan syarat2 yang
        # telah ditetapkan
        $sql_pilihan = " SELECT * FROM barang, jenama
        WHERE       barang.kod_jenama = jenama.kod_jenama
                    $tambahan
        GROUP BY    barang.nama_barang
        ORDER BY    barang.harga ";

        # Melaksanakan proses carian berdasarkan arahan SQL di atas
        $laksana_pilihan = mysqli_query($condb,$sql_pilihan);

        # Jika proses carian tidak menemui data yang sepadan
        if(mysqli_num_rows($laksana_pilihan)==0){
            # Papar Carian tidak ditemui
            echo "Carian tidak ditemui";
        }
        else{
            # Jika proses carian menemui data yang sepadan
            # Papar data barangan tersebut dalam bentuk jadual
            echo "<hr>";
            include ('butang-saiz.php');
            echo "<table border='1' id='saiz' >";

            # Pembolehubah $n mengambil data yang ditemui
            while($n = mysqli_fetch_array($laksana_pilihan)){
                # dan memaparkan dalam bentuk jadual
                echo "  <tr>
			<td style='width: 200px;'>
    				<img src='img/".$n['gambar']."' style='width: 100%; height: auto;'>
			</td>
                        <td>
                        <b> ".$n['jenama_barang']." </b><br>
                            ".$n['nama_barang']." <br>
                            ".$n['ciri']." <br>
                            RM ".$n['harga']." </td>
                        </tr>";
            }
            echo"</table>";
        }
    }
    else {
        echo "sila masukkan maklumat carian";
    }
include ('footer.php');
?>