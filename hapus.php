<?php
// buat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pegawai";

//Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Cek Connection
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
} else {
    echo "Connection Success";
}

// ambil ID data yang akan dihapus dari parameter URL
$idKinerja = $_GET['id'];

// hapus data dari database
$query = "DELETE FROM kinerjapegawai WHERE idKinerja = $idKinerja";
mysqli_query($conn, $query);

// tutup koneksi database
mysqli_close($conn);

// arahkan pengguna kembali ke halaman utama
header('Location: nomor3.php');
?>