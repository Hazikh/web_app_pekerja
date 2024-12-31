<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(223, 229, 241);
            color: #f8f9fa;
        }
        .card {
            background-color:rgb(177, 181, 187);
            border: none;
        }
        .form-control {
            background-color:rgb(253, 253, 253);
            border: none;
            color:rgb(0, 0, 0);
        }
        .form-control:focus {
            background-color:rgb(209, 187, 187);
            border-color:rgb(0, 0, 0);
            color:rgb(0, 0, 0);
            box-shadow: 0 0 0 0.2rem rgba(99, 179, 237, 0.25);
        }
        .btn-primary {
            background-color:rgb(221, 77, 10);
            border: none;
        }
        .btn-primary:hover {
            background-color: #2b6cb0;
        }
        .alert {
            background-color: #e53e3e;
            color: #f8f9fa;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-4">Log Masuk</h3>

            <?php
            include 'db.php';
            session_start();

            // Jika pengguna sudah log masuk, redirect ke index.php
            if (isset($_SESSION['user'])) {
                header('Location: index.php');
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['user'] = $username;
                    header('Location: index.php');
                    exit();
                } else {
                    echo '<div class="alert alert-danger text-center">Log masuk gagal!</div>';
                }
            }
            ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log Masuk</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
