<?php
session_start();
include 'koneksi.php';
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['userid'];

$ceklike = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='fotoid' AND userid='userid'");

if (mysqli_num_rows($ceklike) == 1) {
    while($row = mysqli_fetch_array($ceklike)) {
        $likeid = $row['likeid'];
        $query = mysqli_query($koneksi, "DELETE FROM likefoto WHERE likeid='$likeid'");
        echo "<script>
        location.href='../admin/home.php';
        </script>";
    }
} else {
    $tanggallike = date('Y-m-d');
    $query = mysqli_query($koneksi, "INSERT INTO likefoto VALUES('', '$fotoid', '$userid', '$tanggallike')");

    echo "<script>
    location.href='../admin/home.php';
    </script>";
}

?>