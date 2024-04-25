<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Galeri</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container">
          <strong><a class="navbar-brand text-secondary" href="index.php">Website Galeri</a></strong>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
              
            </div>
            <a href="register.php" class="btn btn-primary m-1">Sign Up</a>
            <a href="login.php" class="btn btn-primary m-1">Log In</a>
          </div>
        </div>
    </nav>
    <br>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body bg-emphasis">
            <div class="text-center">
              <h3>Log In</h3>
            </div>
            <form action="config/aksi_login.php" method="POST">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" require>
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" require>
              <div class="d-grid mt-2">
                <button class="btn btn-secondary" type="submit" name="kirim">Log In</button>
              </div>
            </form>
          <hr>
          <p>Belum Punya Akun? <a href="register.php" class="text-primary">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-secondary fixed-bottom text-light">
        <p>&copy; Website Galeri | By Saefuloh</p>
    </footer>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>