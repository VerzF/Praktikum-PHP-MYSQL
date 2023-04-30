<?php
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

$query = "SELECT pegawai.idPegawai, kinerjapegawai.idKinerja, kinerjapegawai.kinerjaPegawai, pegawai.namaPegawai  
          FROM kinerjapegawai 
          JOIN pegawai ON kinerjapegawai.idKinerja = pegawai.idKinerja";

$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- tambahkan tombol "Tambah Data" di atas tabel -->
<a href="tambah.php">Tambah Data</a>
<table>
    <thead>
        <tr>
            <th>ID Pegawai</th>
            <th>ID Kinerja</th>
            <th>Kinerja Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($data = mysqli_fetch_array($hasil)) { ?>
        <tr>
            <td><?php echo $data['idPegawai']; ?></td>
            <td><?php echo $data['idKinerja']; ?></td>
            <td><?php echo $data['kinerjaPegawai']; ?></td>
            <td><?php echo $data['namaPegawai']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['idKinerja']; ?>">Edit</a>
                <a href="hapus.php?id=<?php echo $data['idKinerja']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


</body>
</html>