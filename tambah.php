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

// cek apakah form telah disubmit
if (isset($_POST['submit'])) {
    // ambil data dari form
    $namaPegawai = $_POST['namaPegawai'];
    $idKinerja = $_POST['idKinerja'];
  
    // query untuk menambahkan data
    $sql = "INSERT INTO pegawai (idKinerja, namaPegawai) VALUES ('$idKinerja', '$namaPegawai')";
  
    // eksekusi query
    if (mysqli_query($conn, $sql)) {+
        // mengarahkan kembali ke halaman nomor3.php  
        header('Location: nomor3.php');
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
  }

  // tutup koneksi database
  mysqli_close($conn);
  
  ?>
  
  <!-- tampilkan form tambah data -->
  <form method="POST">
    <label for="namaPegawai">Nama Pegawai:</label>
    <input type="text" name="namaPegawai" id="namaPegawai" required>
    <br>
    <label for="idKinerja">ID Kinerja:</label>
    <input type="number" name="idKinerja" id="idKinerja" required>
    <br>
    <button type="submit" name="submit">Simpan</button>
</form>