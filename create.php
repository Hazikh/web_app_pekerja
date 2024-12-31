<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pekerja</title>
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
            <a href="index.php" class="btn btn-secondary">BACK</a>
        </div>

        <div class="form-container mt-4">
            <h1 class="h4 text-center mb-4">ADD MAKLUMAT</h1>

            <form action="store.php" method="POST">

                <div class="mb-3">
                    <label for="no_kp" class="form-label">IC</label>
                    <input type="text" id="no_kp" name="no_kp" class="form-control" required>
                </div>                
                <div class="mb-3">
                    <label for="nama_pekerja" class="form-label">NAMA</label>
                    <input type="text" id="nama_pekerja" name="nama_pekerja" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">HP</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jantina" class="form-label">JANTINA</label>
                    <select id="jantina" name="jantina" class="form-select" required>
                        <option value="">Pilih Jantina</option>
                        <option value="Lelaki">Lelaki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-warning" onclick="confirmClear()">Clear</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmClear() {
            if (confirm("Are you sure you want to clear all fields?")) {
                document.querySelector("form").reset();
            }
        }
    </script>
</body>
</html>
