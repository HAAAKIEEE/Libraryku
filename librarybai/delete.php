<?php
include("koneksi.php");

// Menggunakan id sebagai parameter (sesuai dengan yang digunakan di index.php)
$id_buku = $_GET['id_buku'];
$gambar = $_GET["gambar"];

$sql = "SELECT * FROM mdt_buku WHERE id_buku='$id_buku'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
$nama_gambar = $data['gambar'];
$nama_file = $data['file'];

// Perintah SQL untuk menghapus data
$query = "DELETE FROM mdt_buku WHERE id_buku='$id_buku'";
$hapus_bank = mysqli_query($koneksi, $query);

if ($hapus_bank) {
    $file_path = "asset/fobook/" . $nama_gambar;
    $file = "asset/book/" . $nama_file;
    if (file_exists($file_path) && file_exists($file)) {
        unlink($file_path);
        unlink($file);

    }
    header("Location:admin.php?hapus=berhasil");
} else {
    header("Location:admin.php?hapus=gagal");
}

// Redirect kembali ke halaman utama setelah menghapus data
?>
