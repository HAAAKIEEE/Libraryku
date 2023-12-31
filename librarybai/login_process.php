<?php
session_start();
include("koneksi.php");


$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

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
} else {
    // Authentication failed, redirect back to login form with an error message
    header("Location: login.php?error=1");
}

$koneksi->close();
?>
