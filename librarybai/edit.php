<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $deskripsi = $_POST['deskripsi'];
    $pengarang = $_POST['pengarang'];
    $jenis_buku = $_POST['jenis_buku'];
    $create_date = $_POST['create_date'];

    // Cek apakah ada file gambar yang diunggah
    if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));

        // Periksa ekstensi gambar yang diizinkan
        if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
            $file_tmp_gambar = $_FILES['gambar']['tmp_name'];

            // Pindahkan gambar ke folder
            move_uploaded_file($file_tmp_gambar, 'asset/fobook/' . $gambar);
        } else {
            header("Location: admin.php?add=gagal");
            exit();
        }
    }

    // Cek apakah ada file yang diunggah
    if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $ekstensi_diperbolehkan_file = array('pdf', 'rar', 'txt');
        $file = $_FILES['file']['name'];
        $x = explode('.', $file);
        $ekstensi_file = strtolower(end($x));

        // Periksa ekstensi file yang diizinkan
        if (in_array($ekstensi_file, $ekstensi_diperbolehkan_file)) {
            $file_tmp_file = $_FILES['file']['tmp_name'];

            // Pindahkan file ke folder
            move_uploaded_file($file_tmp_file, 'asset/book/' . $file);
        } else {
            header("Location: admin.php?add=gagal");
            exit();
        }
    }

    // Query untuk update data buku
    $query = "UPDATE mdt_buku SET judul_buku='$judul_buku', deskripsi='$deskripsi', pengarang='$pengarang', jenis_buku='$jenis_buku', create_date=NOW()";

    // Tambahkan kolom gambar ke query jika ada file gambar yang diunggah
    if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $query .= ", gambar='$gambar'";
    }

    // Tambahkan kolom file ke query jika ada file yang diunggah
    if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $query .= ", file='$file'";
    }

    $query .= " WHERE id_buku='$id_buku'";

    $simpan_buku = mysqli_query($koneksi, $query);

    if ($simpan_buku) {
        header("Location: admin.php?add=berhasil");
    } else {
        header("Location: admin.php?add=gagal");
    }
}
?>
