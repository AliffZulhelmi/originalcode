<?PHP
# Nama host. localhost merupakan default
$nama_host = "localhost";

# Username bagi SQL. root merupakan default
$nama_sql = "root";

# Password bagi SQL. Masukkan password anda.
$pass_sql = "";

# Nama pangkalan data yang anda telah bangunkan sebelum ini.
$nama_db = "default_db";

# Membuka hubungan antara pangkalan data dan sistem.
$condb = mysqli_connect($nama_host, $nama_sql, $pass_sql, $nama_db);

# Menguji adakah hubungan berjaya dibuka
if (!$condb)
{
    die("Sanbungan ke pangkalan data gagal");
}
else
{
    #echo "Sambungan ke pangkalan data berjaya";
}
?>