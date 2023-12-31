<!-- File baru form edit.php -->
<!DOCTYPE html>
<?php
session_start();
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}

include("koneksi.php");

?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Libraryku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-white sticky-top">

<a class="navbar-brand fs-3 fw-bold" href="#">Libraryku</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="mhs.php">Home</a>
        <a class="nav-link" href="mhs.php/#buku">Buku</a>
        <a class="nav-link" href="mhs.php/#dikte">Lapotan Ta</a>
        <form class="d-flex" role="search">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <div class="dropdown me-1">
                <button type="button" class="btn btn-success dropdown-toggle ms-2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                    Account
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="mypro.php">My Profile</a></li>

                    <?php
                    // Dapatkan informasi mahasiswa dari sesi
                    $username_mhs = $_SESSION['username'];

                    // Query untuk mendapatkan informasi mahasiswa berdasarkan username
                    $query_info_mhs = "SELECT * FROM mhs WHERE username='$username_mhs'";
                    $result_info_mhs = mysqli_query($koneksi, $query_info_mhs);

                    if ($result_info_mhs) {
                        $data_mhs = mysqli_fetch_assoc($result_info_mhs);

                        // Cek apakah semester mahasiswa adalah 6
                        if ($data_mhs['id_smt'] >= 6) {
                            // Semester 6, tampilkan tombol "Upload"
                            echo '<li><a href="form-input-ta.php" type="button" class=" dropdown-item">Upload</a></li>';
                        }
                    }
                    ?>
                    <li><a href="logout.php" type="button" class=" dropdown-item">Logout</a></li>
                </ul>
            </div>



    </div>
</div>

</nav>

        <figure class="text-center mt-5">
            <blockquote class="blockquote">
                <p>Data Buku Yang Tersedia.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">Kelola Data Buku</cite>
            </figcaption>
        </figure>
        <!-- end -->

        <!-- form -->
        <form action="simpan_mhs.php" method="post" enctype="multipart/form-data">
        <?php
            $username = $_SESSION['username'];
            $query = "SELECT mhs.nim, prodi.id_prodi 
                      FROM mhs 
                      INNER JOIN prodi ON mhs.id_prodi = prodi.id_prodi 
                      WHERE username = '$username'";

            $result = mysqli_query($koneksi, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            ?>
            <input type="hidden" name="nim" value="<?php echo $row['nim']; ?>">
            <input type="hidden" name="id_prodi" value="<?php echo $row['id_prodi']; ?>">
            <?php
            }
            ?>

            <div class="mb-3">
                <label for="judul_laporan" class="form-label">Judul Laporan</label>
                <input type="text" class="form-control" id="judul_laporan" name="judul_laporan">
            </div>
            <div class="mb-3">
                <label for="abstrak" class="form-label">Abstrak</label>
                <textarea class="form-control" id="abstrak" rows="3" name="abstrak"></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="file" name="file" accept=".pdf , .rar">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>

            <button type="submit" name="btn_simpan" class="btn btn-primary">Simpan</button>

            <!-- <button class='btn btn-success' type='submit' name='btn_simpan' value='btn_simpan'>Simpan Data</button> -->
        </form>
        <!-- end form -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>