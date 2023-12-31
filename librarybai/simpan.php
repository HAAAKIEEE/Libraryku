<?php
include("koneksi.php");

$judul_buku = $_POST['judul_buku'];
$deskripsi = $_POST['deskripsi'];
$pengarang = $_POST['pengarang'];
$jenis_buku = $_POST['jenis_buku'];
if (isset($_POST['btn_simpan'])) {

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file = $_FILES['gambar']['tmp_name'];


        $ekstensi_diperbolehkan_file = array('pdf', 'rar', 'txt');
        $file = $_FILES['file']['name'];
        $x = explode('.', $file);
        $ekstensi_file = strtolower(end($x));
        $file_tmp = $_FILES['file']['tmp_name'];

        if (!empty($gambar) && !empty($file) ) {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true && in_array($ekstensi_file, $ekstensi_diperbolehkan_file) === true) {

                //Mengupload gambar
                move_uploaded_file($file, 'asset/fobook/' . $gambar);
                move_uploaded_file($file_tmp, 'asset/book/' . $file);

                $query = "INSERT INTO mdt_buku VALUES('','$judul_buku','$deskripsi','$pengarang','$jenis_buku','1','$gambar',NOW(),'$file')";

                $simpan_bank = mysqli_query($koneksi, $query);
                ;

                if ($simpan_bank) {
                    header("Location:admin.php?add=berhasil");
                } else {
                    header("Location:admin.php?add=gagal");
                }
            }
        } else {
            $gambar = "bank_default.png";

        }
    }
}
?>