<?php
session_start();
include '../config/koneksi.php';
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
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header bg-secondary">Tambah foto</div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" require>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsifoto" require></textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid" require>
                                <?php
                                $userid = $_SESSION['userid'];
                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while($data_album = mysqli_fetch_array($sql_album)){ ?>
                                    <option value="<?php echo $data_album['albumid'] ?>"> <?php echo $data_album['namaalbum'] ?> </option>
                                <?php } ?>
                            </select>
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="lokasifile" require>
                            <button type="submit" class="btn btn-secondary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header bg-secondary">Data Galeri Foto</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Judul Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                                
                                while($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><img src="../asset/img/<?php echo $data['lokasifile']?>" width="100"></td>
                                    <td><?php echo $data['judulfoto']?></td>
                                    <td><?php echo $data['deskripsifoto']?></td>
                                    <td><?php echo $data['tanggalunggah']?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">
                                        <!-- Button EDIT -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </button>
                                        <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                        <label class="form-label">Judul Foto</label>
                                                        <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" require>
                                                        <label class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" name="deskripsifoto" require><?php echo $data['deskripsifoto']; ?>
                                                        </textarea>
                                                        <label class="form-label">Album</label>
                                                        <select class="form-control" name="albumid" >
                                                            <?php
                                                            $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                                            while($data_album = mysqli_fetch_array($sql_album)){ ?>
                                                                <option <?php if($data_album['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>"> <?php echo $data_album['namaalbum'] ?> </option>

                                                            <?php } ?>
                                                        </select>
                                                        <label class="form-label">Foto</label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="../asset/img/<?php echo $data['lokasifile']?>" width="100">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <label class="form-label">Ganti File</label>
                                                                <input type="file" class="form-control" name="lokasifile" >
                                                            </div>
                                                        </div>
                                                        
                                                    
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit" class="btn btn-success">
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
                                                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                                                            </svg> Simpan
                                                        </button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid'] ?>">
                                        <!-- Button HAPUS -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                            </svg>
                                        </button>
                                        <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi_foto.php" method="POST">
                                                        <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                        <strong>Apakah yakin anda ingin menghapus data?</strong> 
                                                    
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus" class="btn btn-secondary">Hapus Data</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-secondary fixed-bottom text-light">
        <p>&copy; Website Galeri | By Saefuloh</p>
    </footer>

<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>