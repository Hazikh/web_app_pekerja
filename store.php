<?php
include 'db.php';
session_start();

// Semak sama ada pengguna telah log masuk
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Semak jika permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pekerja = mysqli_real_escape_string($conn, $_POST['nama_pekerja']);
    $no_kp = mysqli_real_escape_string($conn, $_POST['no_kp']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $jantina = mysqli_real_escape_string($conn, $_POST['jantina']);

    // Masukkan data ke dalam pangkalan data
    $query = "INSERT INTO pekerja (nama_pekerja, no_kp, no_hp, jantina) 
              VALUES ('$nama_pekerja', '$no_kp', '$no_hp', '$jantina')";
    
    if (mysqli_query($conn, $query)) {
        // Berjaya masukkan data
        $_SESSION['success'] = "Data pekerja berjaya ditambah!";
        header('Location: index.php');
    } else {
        // Gagal masukkan data
        $_SESSION['error'] = "Ralat: Tidak dapat menyimpan data!";
        header('Location: create.php');
    }
} else {
    // Akses terus ke fail ini tidak dibenarkan
    header('Location: create.php');
    exit();
}
?>
