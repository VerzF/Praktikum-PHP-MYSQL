<?php
// buat connection ke database
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

// ambil data yang akan diedit dari database
$idKinerja = $_GET['id'];
$query = "SELECT * FROM kinerjapegawai WHERE idKinerja = $idKinerja";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);

// jika tombol submit ditekan, update data ke database
if (isset($_POST['submit'])) {
    $kinerjaPegawaiBaru = $_POST['kinerjaPegawai'];
    $query = "UPDATE kinerjapegawai SET kinerjaPegawai = '$kinerjaPegawaiBaru' WHERE idKinerja = $idKinerja";
    mysqli_query($conn, $query);
    header('Location: nomor3.php');
}

// tutup connection database
mysqli_close($conn);
?>

<!-- tampilkan form edit data -->
<form method="POST">
    <label for="kinerjaPegawai">Kinerja Pegawai:</label>
    <input type="text" name="kinerjaPegawai" value="<?php echo $data['kinerjaPegawai']; ?>">
    <br>
    <input type="submit" name="submit" value="Simpan">
</form>

