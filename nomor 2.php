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

//Database
$sql = "CREATE TABLE kinerjapegawai (
    idKinerja INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kinerjaPegawai VARCHAR(20) NOT NULL)";

try {   
    if (mysqli_query($conn, $sql)) {
        echo "Tabel kinerjapegawai telah dibuat<br>";
    } else {
        echo "Terdapat error, tabel kinerjapegawai tidak dapat dibuat: " . mysqli_error($conn);
    }
} catch (Exception $e) {
    echo '<br><br> Caught Exception: ', $e->getMessage(), "\n"; 
    
}

$sql = "CREATE TABLE `pegawai` (
    `idPegawai` int(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `idKinerja` int(5) NOT NULL,
    `namaPegawai` varchar(20) NOT NULL)";

try {
    if (mysqli_query($conn, $sql)) {
        echo "Tabel pegawai telah dibuat<br>";
    } else {
        echo "Terdapat error, tabel pegawai tidak dapat dibuat: " . mysqli_error($conn);
    }
} catch (\Exception $e) {
    //throw $th;
    echo '<br><br> Caught Exception: ', $e->getMessage(), "\n";
}

$sql = "INSERT INTO `pegawai` (`idPegawai`, `idKinerja`, `namaPegawai`) VALUES
(1, 1, 'Allen'),
(2, 2, 'Donny'),
(3, 3, 'Irawan');";

try {
    if (mysqli_query($conn, $sql)) {
        echo "penambahan data pada tabel pegawai telah dibuat<br>";
    } else {
        echo "Terdapat error, data pegawai tidak dapat dibuat: " . mysqli_error($conn);
    }
} catch (Exception $e) {
    //throw $th;
    echo '<br><br> Caught Exception: ', $e->getMessage(), "\n"; 
}
//INSERT
$sql = "INSERT INTO `kinerjapegawai` (`idKinerja`, `kinerjaPegawai`) VALUES
(1, 'Baik'),
(2, 'Cukup Baik'),
(3, 'Sangat Baik')";

try {
    if (mysqli_query($conn, $sql)) {
    echo "penambahan data pada tabel kinerjapegawai telah dibuat<br>";
} else {
    echo "Terdapat error, data kinerjapegawai tidak dapat dibuat: " . mysqli_error($conn);
}
} catch (\Exception $e) {
    //throw $th;
    echo '<br><br> Caught Exception: ', $e->getMessage(), "\n";
}

$sql = "ALTER TABLE `pegawai`
ADD CONSTRAINT `relasi_pegawai` FOREIGN KEY (`idKinerja`) REFERENCES `kinerjaPegawai` (`idKinerja`);
COMMIT;";
echo "<br><br>Tabel pegawai dan tabel kinerjapegawai berhasil digabungkan";
mysqli_close($conn);
?>  