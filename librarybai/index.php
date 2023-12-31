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
          <a class="nav-link active" aria-current="page" href="#home">Home</a>
          <a class="nav-link" href="#buku">Buku</a>
          <form class="d-flex" role="search">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <a href="login.php" type="button" class="btn btn-success ms-2">Login</a>
        </div>
      </div>

    </nav>

    <figure class="text-center mt-5">
      <blockquote class="blockquote">
        <p>Data Buku Yang Tersedia.</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        <cite title="Source Title">Library Ku</cite>
      </figcaption>
    </figure>
    <!-- end -->
    <div class="container-card row d-flex justify-content-around buku" id="buku">
      <?php
      $query = "SELECT * FROM mdt_buku";
      $sql = mysqli_query($koneksi, $query);
      while ($data = mysqli_fetch_array($sql)) {
        ?>
        <div class="card p-3 m-2 col-lg-2" style="width:18rem;">
          <img src="asset/fobook/<?php echo $data['gambar'];
          ?>" alt="Gambar" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $data['judul_buku']; ?>
            </h5>
            <p class="card-text description">Deskripsi :
              <?php echo $data['deskripsi'];
              ?>
            </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Pengarang :
              <?php echo $data['pengarang'];
              ?>
            </li>
            <li class="list-group-item">Jenis Buku :
              <?php echo $data['jenis_buku'];
              ?>
            </li>
          </ul>
          <div class="card-body">
            <a href="asset/book/<?php echo $data['file']; ?>#toolbar=0" target="_blank" type="button" class="btn btn-success mb-3 ">Baca Buku
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book"
                viewBox="0 0 16 16">
                <path
                  d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
              </svg></a>
          </div>
        </div>
       
        <?php

      }
      ?>
    </div>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <!-- ... (Bagian JavaScript setelah Bootstrap) ... -->
  <script>
    // Menggunakan jQuery untuk mendeteksi klik pada tombol dan menambahkan/menghapus kelas 'd-none' pada deskripsi
    $(document).ready(function () {
      $('.toggle-description').click(function () {
        $(this).closest('.card-body').find('.description').toggleClass('d-none');
      });
    });
  </script>
</body>

</html>