<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#buku">Buku</a>
                    <a class="nav-link" href="#ta">Lapotan Ta</a>
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
        <cite title="Source Title">Library Ku</cite>
      </figcaption>
    </figure>
    <!-- end -->

    <a href="form-input.php" type="button" id="tambah" class="btn btn-success mb-3  ">Tambah Buku <svg
        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
        viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
        <path
          d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
      </svg></a>


    <!-- table -->
    <table class="table table table-hover table-bordered align-middle sm- buku" id="buku">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Pengarang</th>
          <th scope="col">JenisBuku</th>
          <th scope="col">Nama Pengupload</th>
          <th scope="col">Ditambahkan</th>
          <th scope="col">Gambar</th>
          <th scope="col">file</th>

          <th scope="col">Aktivitas</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT mdt_buku.*,admin.username FROM mdt_buku 
        INNER JOIN admin ON mdt_buku.id_admin = admin.id_admin";
        $sql = mysqli_query($koneksi, $query);
        $no = 1;
        while ($data = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <th scope="row">
              <?php echo $no;
              ?>
            </th>
            <td>
              <?php echo $data['judul_buku'];
              ?>
            </td>
            <td>
              <?php echo $data['deskripsi'];
              ?>
            </td>
            <td>
              <?php echo $data['pengarang'];
              ?>
            </td>
            <td>
              <?php echo $data['jenis_buku'];
              ?>
            </td>
            <td>
              <?php echo $data['username'];
              ?>
            </td>
            <td>
              <?php echo $data['create_date'];
              ?>
            </td>
            <td><img src="asset/fobook/<?php echo $data['gambar'];
            ?>" alt="Gambar" style="width:100px;">
            </td>
            <td>
              <?php echo $data['file'];
              ?>
            </td>
            <td><a href="form-edit.php?id_buku=<?php echo $data['id_buku']; ?>"><svg xmlns="http://www.w3.org/2000/svg"
                  width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                  <path
                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg></a>
              <input type="hidden" value="<?php echo $data['id_buku']; ?> " name="id_buku">

              <a href="delete.php?id_buku=<?php echo $data['id_buku']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-trash3-fill" viewBox="0 0 16 16">
                  <path
                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                </svg>
              </a>
            </td>
          </tr>
          <?php
          $no++;
        }
        ?>
      </tbody>
    </table>

    <figure class="text-center mt-5">
      <blockquote class="blockquote">
        <p>Terima atau Tolak TA.</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        <cite title="Source Title">Library Ku</cite>
      </figcaption>
    </figure>

    <!-- table TA-->
    <table class="table table table-hover table-bordered align-middle sm- ta" id="ta">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul TA</th>
          <th scope="col">Abstrak</th>
          <th scope="col">Nama Pengupload</th>
          <th scope="col">Prodi</th>
          <th scope="col">File</th>
          <th scope="col">Ditambahkan</th>
          <th scope="col">Aktivitas</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT mdt_laporan_ta.*,mhs.nama_mhs,prodi.nama_prodi FROM mdt_laporan_ta 
                   INNER JOIN mhs ON mdt_laporan_ta.nim = mhs.nim
                   INNER JOIN prodi ON mdt_laporan_ta.id_prodi = prodi.id_prodi";
        $sql = mysqli_query($koneksi, $query);
        $no = 1;
        while ($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <th scope="row">
              <?php echo $no;
              ?>
            </th>
            <td>
              <?php echo $row['judul_laporan'];
              ?>
            </td>
            <td>
              <?php echo $row['abstrak'];
              ?>
            </td>
            <td>
              <?php echo $row['nama_mhs'];
              ?>
            </td>
            <td>
              <?php echo $row['nama_prodi'];
              ?>
            </td>
            <td>
              <?php echo $row['file'];
              ?>
            </td>
            <td>
              <?php echo $row['create_date'];
              ?>
            </td>
            <td><a href="admin.php?laporan=berhasil-di-acc"><svg xmlns="http://www.w3.org/2000/svg"
                  width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                  <path
                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207z" />
                  <path
                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                </svg></a>
              <input type="hidden" value="<?php echo $row['id_laporan']; ?> " name="id_laporan">

              <a href="tolak.php?id_laporan=<?php echo $row['id_laporan']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-envelope-slash-fill" viewBox="0 0 16 16">
                  <path
                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207z" />
                  <path
                    d="M14.975 10.025a3.5 3.5 0 1 0-4.95 4.95 3.5 3.5 0 0 0 4.95-4.95Zm-4.243.707a2.501 2.501 0 0 1 3.147-.318l-3.465 3.465a2.501 2.501 0 0 1 .318-3.147m.39 3.854 3.464-3.465a2.501 2.501 0 0 1-3.465 3.465Z" />
                </svg>
              </a>
            </td>
          </tr>
          <?php
          $no++;
        }
        ?>
      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script>

    function konfirmasi() {
      konfirmasi = confirm("Apakah anda yakin ingin menghapus gambar ini?")
      document.writeln(konfirmasi)
    }

    $(document).on("click", "#pilih_gambar", function () {
      var file = $(this).parents().find(".file");
      file.trigger("click");
    });

  </script>
</body>

</html>