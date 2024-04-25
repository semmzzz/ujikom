<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    // Periksa apakah data yang ingin disimpan kosong
    if(empty($namaalbum) || empty($deskripsi) || empty($tanggal) || empty($userid)) {
        echo "<script>
        alert('Data tidak lengkap. Silakan lengkapi semua data.');
        window.location.href='../admin/album.php';
        </script>";
        exit();
    }

    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('', '$namaalbum', '$deskripsi','$tanggal','$userid')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/album.php';
    </script>";
}

if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    // Periksa apakah data yang ingin diperbarui kosong
    if(empty($namaalbum) || empty($deskripsi) || empty($tanggal) || empty($userid)) {
        echo "<script>
        alert('Data tidak lengkap. Silakan lengkapi semua data.');
        window.location.href='../admin/album.php';
        </script>";
        exit();
    }

    $sql = mysqli_query($koneksi, "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi', tanggalbuat='$tanggal' WHERE albumid='$albumid'");

    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../admin/album.php';
    </script>";
}
if (isset($_POST['hapus'])) {
    $albumid = $_POST['albumid'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$albumid'");

    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/album.php';
    </script>";
}
?>
