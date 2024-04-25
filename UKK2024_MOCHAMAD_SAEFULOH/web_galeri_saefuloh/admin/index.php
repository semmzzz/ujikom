<?php
session_start();
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login!');
    location.href='../index.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Galeri</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container">
          <strong>
              <a class="navbar-brand text-primary" href="index.php">
                   <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M19.5 7A9 9 0 0 0 12 3a8.99 8.99 0 0 0-7.484 4"/><path d="M11.5 3a17 17 0 0 0-1.826 4M12.5 3a17 17 0 0 1 1.828 4M19.5 17a9 9 0 0 1-7.5 4a8.99 8.99 0 0 1-7.484-4"/><path d="M11.5 21a17 17 0 0 1-1.826-4m2.826 4a17 17 0 0 0 1.828-4M2 10l1 4l1.5-4L6 14l1-4m10 0l1 4l1.5-4l1.5 4l1-4M9.5 10l1 4l1.5-4l1.5 4l1-4"/></g></svg>  Galeri
              </a>
          </strong>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
            </div>
            <strong>
              <ul class="nav justify-content-end">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="album.php">Album</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="foto.php">Foto</a>
              </li>
              <ul></ul>
              </ul> 
            </strong>
  
            
            
            <a href="../config/aksi_logout.php" class="btn btn-danger m-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg> Log Out</a>
          </div>
        </div>
    </nav>
    <br>

    <footer class="d-flex justify-content-center border-top mt-3 bg-secondary fixed-bottom text-light">
        <p>&copy; Website Galeri | By Saefuloh</p>
    </footer>

<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>