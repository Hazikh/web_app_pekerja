<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemaskini Pekerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-box {
            background-color:rgb(255, 255, 255);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="custom-box d-flex justify-content-between align-items-center">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <h5 class="mb-0">ANISHOLDINGS SDN. BHD</h5>
        </div>

        <div class="form-container mt-4">
        <?php
        include 'db.php';
        session_start();

        // Periksa sama ada pengguna sudah log masuk
        if (!isset($_SESSION['user'])) {
            header('Location: login.php');
            exit();
        }

        // Semak jika parameter ID diberikan
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM pekerja WHERE id = '$id'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "<div class='alert alert-danger'>Data tidak dijumpai!</div>";
                exit();
            }
        } else {
            header('Location: index.php');
            exit();
        }
        ?>

        <!-- Tajuk Update dengan nama pekerja -->
        <h1 class="h4 text-center mb-4">UPDATE <?= isset($row) ? $row['nama_pekerja'] : 'Nama Pekerja' ?></h1>

        <form action="update_process.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <div class="mb-3">
                <label for="no_kp" class="form-label">IC</label>
                <input type="text" id="no_kp" name="no_kp" class="form-control" value="<?= $row['no_kp'] ?>" required>
            </div>
                <div class="mb-3">
                <label for="nama_pekerja" class="form-label">NAMA</label>
                <input type="text" id="nama_pekerja" name="nama_pekerja" class="form-control" value="<?= $row['nama_pekerja'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">HP</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?= $row['no_hp'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="jantina" class="form-label">JANTINA</label>
                <select id="jantina" name="jantina" class="form-select" required>
                    <option value="" disabled>Pilih Jantina</option>
                    <option value="Lelaki" <?= $row['jantina'] == 'Lelaki' ? 'selected' : '' ?>>Lelaki</option>
                    <option value="Perempuan" <?= $row['jantina'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Kemaskini</button>
            </div>
        </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
