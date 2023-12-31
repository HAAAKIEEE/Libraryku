<?php
include("koneksi.php");

// Menggunakan id sebagai parameter (sesuai dengan yang digunakan di index.php)
$id_laporan = $_GET['id_laporan'];

$sql = "SELECT * FROM mdt_buku WHERE id_buku='$id_buku'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
$nama_file = $data['file'];

// Perintah SQL untuk menghapus data
$query = "DELETE FROM mdt_laporan_ta WHERE id_laporan='$id_laporan'";
$hapus_bank = mysqli_query($koneksi, $query);

if ($hapus_bank) {
    $file = "asset/book/" . $nama_file;
    if (file_exists($file)) {
        unlink($file);

    }
    header("Location:admin.php?hapus=berhasil");
} else {
    header("Location:admin.php?hapus=gagal");
}

// Redirect kembali ke halaman utama setelah menghapus data
?>
