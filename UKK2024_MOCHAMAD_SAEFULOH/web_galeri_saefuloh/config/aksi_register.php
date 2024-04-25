<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Periksa apakah semua data telah diisi
    if(empty($username) || empty($password) || empty($email) || empty($nama) || empty($alamat)) {
        // Jika ada data yang kosong, tampilkan pesan error
        echo "<script>
        alert('Silakan lengkapi semua data.');
        window.location.href='../register.php'; 
        </script>";
        exit(); // Hentikan eksekusi script
    }

    // Cek apakah username atau email sudah ada di database
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($query) > 0) {
        // Jika username atau email sudah ada, kembalikan ke halaman register dengan pesan error
        echo "<script>
        alert('Username atau email sudah digunakan. Silakan pilih username atau email lain.');
        window.location.href='../register.php'; 
        </script>";
        exit(); // Hentikan eksekusi script
    } else {
        // Jika username dan email belum ada, lanjutkan dengan proses pendaftaran
        $sql = mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username','$password','$email','$nama','$alamat')");
        
        if ($sql) {
            // Jika pendaftaran berhasil, tampilkan pesan sukses dan arahkan pengguna ke halaman login
            echo "<script>
            alert('Daftar Akun berhasil');
            location.href='../login.php';
            </script>";
            exit(); // Hentikan eksekusi script
        } else {
            // Jika terjadi kesalahan saat menyimpan data, tampilkan pesan error
            echo "<script>alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');</script>";
        }
    }
}
?>
