
<!DOCTYPE html>
<?php
session_start();
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}

include("koneksi.php");

$username_mhs = $_SESSION['username'];
$query = "SELECT mhs.*, prodi.nama_prodi, smt.nama_smt
          FROM mhs
          INNER JOIN prodi ON mhs.id_prodi = prodi.id_prodi
          INNER JOIN smt ON mhs.id_smt = smt.id_smt
          WHERE mhs.username = '$username_mhs'"; // Ganti username dengan sesuai session yang digunakan untuk login

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($result) > 0) {
    // Tampilkan data profil mahasiswa
    while ($row = mysqli_fetch_assoc($result)) {

?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Libraryku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg .bg-light">

            <a class="navbar-brand fs-3 fw-bold" href="#">Libraryku</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="mhs.php">Home</a>
                    <a class="nav-link" href="mhs.php">Buku</a>
                    <a class="nav-link" href="mhs.php">Lapotan Ta</a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
  <div class="dropdown me-1">
    <button type="button" class="btn btn-success dropdown-toggle ms-2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
      Account
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">My Profile</a></li>
      
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
        
   
        <!-- nabar end -->
        <h1 class="my-5">My Profile</h1>
        <div class="row">
            <div class="col-md-6">
                   <!-- Gambar profil dummy -->
                   <img src="https://via.placeholder.com/150" alt="Profil Picture" class="img-fluid rounded">
                <p>NIM: <?php echo $row['nim']; ?></p>
                <p>Nama: <?php echo $row['nama_mhs']; ?></p>
                <p>Jenis Kelamin: <?php echo $row['jenkel']; ?></p>
                <p>Program Studi: <?php echo $row['nama_prodi']; ?></p>
                <p>Semester: <?php echo $row['nama_smt']; ?></p>
             
                <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
            </div>
        </div>

   

     
    </div>




 <!-- Bootstrap JS, Popper.js, dan jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- ... (Bagian JavaScript setelah Bootstrap) ... -->
    
</body>

</html>
<?php
    }
} else {
    echo "Data tidak ditemukan";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
  