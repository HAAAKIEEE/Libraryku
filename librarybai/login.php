<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
include("koneksi.php");

if(isset($_SESSION['username']) && isset($_SESSION['role'])) {
    // Jika pengguna sudah login, redirect ke halaman sesuai peran (role)
    if ($_SESSION['role'] == "mhs") {
        header("Location: mhs.php");
    } elseif ($_SESSION['role'] == "admin") {
        header("Location: admin.php");
    }
    exit(); // Hindari eksekusi kode login jika pengguna sudah login
}

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    //mengecek apakah form disubmit atau tidak
    if ($role == "mhs") {
        $table = "mhs";
    } elseif ($role == "admin") {
        $table = "admin";
    } else {
        // Handle invalid role
        header("Location: login.php?error=invalid_role");
        exit();
    }

    $query = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // User authenticated, set session and redirect
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role == "mhs") {
            header("Location: mhs.php");
        } elseif ($role == "admin") {
            header("Location: admin.php");
        }
        exit(); // Hindari eksekusi lebih lanjut setelah redirect
    } else {
        // Authentication failed, redirect back to login form with an error message
        header("Location: login.php?error=1");
        exit();
    }
    $koneksi->close();
}
?>

<div class="container mt-5">
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            <h2 class="text-center">Login</h2>
        </div>
        <div class="card-body">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="mhs">Mahasiswa</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block" name="submit">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
