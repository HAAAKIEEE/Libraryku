<?php
include("koneksi.php");

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
    exit();
}

print_r($_POST);
    if (isset($_POST['btn_simpan'])) {

        $judul_laporan = $_POST['judul_laporan'];
        $abstrak = $_POST['abstrak'];
        $nim = $_POST['nim'];
        $id_prodi = $_POST['id_prodi'];
        $status = $_POST['status'];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ekstensi_diperbolehkan = array('pdf','rar','txt');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['file']['tmp_name'];

    if (!empty($file)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'asset/book/' . $file);

            $query = "INSERT INTO mdt_laporan_ta VALUES ('', '$judul_laporan', '$abstrak', '$nim', '$id_prodi', '$file', '$status', NOW())";

            $simpan_laporan = mysqli_query($koneksi, $query);

            if ($simpan_laporan) {
                header("Location:mhs.php?add=berhasil");
                exit();
            } else {
                header("Location:mhs.php?add=gagal");
                exit();
            }
        }
        } else {
            $file = "bank_default.pdf";
    }
}
}
?>
