<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_pekerja';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Sambungan gagal: " . mysqli_connect_error());
}
?>
