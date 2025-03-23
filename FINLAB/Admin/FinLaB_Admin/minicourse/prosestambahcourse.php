<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $level = $_POST['level'];
    $url_video = $_POST['url_video'];

    $query = "INSERT INTO tb_course (judul, deskripsi, level, url_video) VALUES ('$judul', '$deskripsi', '$level', '$url_video')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan kursus: " . mysqli_error($conn);
    }
}
?>
