<?php
include 'db.php';
session_start();

// Periksa jika pengguna sudah log masuk
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Periksa jika data dihantar melalui borang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama_pekerja = mysqli_real_escape_string($conn, $_POST['nama_pekerja']);
    $no_kp = mysqli_real_escape_string($conn, $_POST['no_kp']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $jantina = mysqli_real_escape_string($conn, $_POST['jantina']);

    // Kemaskini data ke dalam pangkalan data
    $query = "UPDATE pekerja SET nama_pekerja='$nama_pekerja', no_kp='$no_kp', no_hp='$no_hp', jantina='$jantina' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke halaman utama dengan mesej kejayaan
        header('Location: index.php?message=updated');
        exit();
    } else {
        echo "<div class='alert alert-danger'>Kemaskini gagal. Sila cuba lagi.</div>";
    }
} else {
    header('Location: index.php');
    exit();
}
?>