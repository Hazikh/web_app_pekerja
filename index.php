<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Maklumat Pekerja</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: url('https://www.toptal.com/designers/subtlepatterns/patterns/carbon-fiber.png');
            background-size: cover;
            background-attachment: fixed;
            background-color:rgb(51, 51, 51);
        }

        .custom-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        th, td {
            padding: 15px 25px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        th {
            background-color: #2c3e50;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
        }

        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ecf0f1;
        }

        /* Reka Bentuk Butang */
        .btn {
            font-size: 12px;  /* Mengurangkan saiz butang */
            border-radius: 5px;
            padding: 8px 15px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }

        .btn-success {
            background-color: #27ae60;
            border: none;
        }

        .btn-success:hover {
            background-color: #2ecc71;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #f39c12;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e67e22;
            transform: scale(1.05);
        }

        .modal-header {
            background-color: #3498db;
            color: #fff;
        }

        .modal-footer .btn-secondary {
            background-color: #95a5a6;
            color: #fff;
        }

        .modal-footer .btn-danger {
            background-color: #e74c3c;
            color: #fff;
        }

        .text-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Tajuk yang cerah */
        h1 {
            font-size: 24px;
            color: #ffffff; /* Warna cerah untuk tajuk */
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="custom-box">
        <h5 class="mb-0" style="font-size: 20px;">ANISHOLDINGS SDN. BHD</h5>
        <a href="create.php" class="btn btn-success">Tambah Baru</a>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">Log Keluar</button>
    </div>

    <div class="d-flex justify-content-center mb-3">
        <h1 class="h4 text-center text-light ">Senarai Pekerja</h1>
    </div>

    <?php
    include 'db.php';
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
    $query = "SELECT * FROM pekerja";
    $result = mysqli_query($conn, $query);
    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pekerja</th>
                <th>No KP</th>
                <th>No HP</th>
                <th>Jantina</th>
                <th class="text-center">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_pekerja'] ?></td>
                <td><?= $row['no_kp'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td><?= $row['jantina'] ?></td>
                <td class="text-center">
                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm mx-1">Kemaskini</a>
                    <button class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteId(<?= $row['id'] ?>)">Padam</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

<!-- Modal Log Keluar -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Log Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Adakah anda pasti ingin log keluar?
            </div>
            <div class="modal-footer">
                <a href="logout.php" class="btn btn-danger">Ya, Log Keluar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Padam -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Padam Rekod</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Adakah anda pasti ingin memadam rekod ini?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="GET">
                    <input type="hidden" name="id" id="deleteId">
                    <button type="submit" class="btn btn-danger">Ya, Padam</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function setDeleteId(id) {
        document.getElementById('deleteId').value = id;
        document.getElementById('deleteForm').action = `delete.php?id=${id}`;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
