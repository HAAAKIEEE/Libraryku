<!-- File baru form edit.php -->
<!DOCTYPE html>
<?php
include("koneksi.php");
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
    <nav class="navbar navbar-expand-lg bg-white sticky-top">

<a class="navbar-brand fs-3 fw-bold" href="#">Libraryku</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
  aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav ms-auto">
    <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
    <a class="nav-link" href="admin.php/#buku">Buku</a>
              <a class="nav-link" href="admin.php/#ta">Lapotan Ta</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
      <a href="logout.php" type="button" class="btn btn-danger ms-2">Logout</a>
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
        <form action="simpan.php" method="post"  enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul_buku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul-buku" name="judul_buku">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang">
            </div>
            <div class="mb-3">
                <label for="jenis_buku" class="form-label pe-3">Jenis Buku</label>
                <select name="jenis_buku" id="jenis_buku">
                    <option value="Buku Bacaan">Buku Bacaan</option>
                    <option value="Buku Ajar(Diktat)">Buku Ajar(Diktat)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".png, .jpg, .jpeg">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="file" name="file" accept=".pdf , .rar">
            </div>
            <button type="submit" name="btn_simpan" class="btn btn-primary">Simpan</button>

            <!-- <button class='btn btn-success' type='submit' name='btn_simpan' value='btn_simpan'>Simpan Data</button> -->
        </form>
        <!-- end form -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
