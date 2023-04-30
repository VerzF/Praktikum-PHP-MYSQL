<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

//Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Cek Connection
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
} else {
    echo "Connection Success";
}

//Database
$sql = "CREATE TABLE buku_tamu (
    ID_BT INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NAMA VARCHAR(200) NOT NULL,
    EMAIL VARCHAR (50) NOT NULL,
    isi text )";

if (mysqli_query($conn, $sql)) {
    echo "Tabel telah dibuat";
} else {
    echo "Terdapat error, tabel tidak dapat dibuat: " . mysqli_error($conn);
}
mysqli_close($conn);
?>