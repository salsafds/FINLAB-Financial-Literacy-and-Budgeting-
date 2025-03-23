<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_course = $_POST['id_course'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $level = $_POST['level'];
    $url_video = $_POST['url_video'];

    $query = "UPDATE tb_course SET judul='$judul', deskripsi='$deskripsi', level='$level', url_video='$url_video' WHERE id_course=$id_course";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Gagal memperbarui kursus: " . mysqli_error($conn);
    }
}
?>
