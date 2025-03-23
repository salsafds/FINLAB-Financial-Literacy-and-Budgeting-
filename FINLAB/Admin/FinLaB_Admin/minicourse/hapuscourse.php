<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tb_course WHERE id_course = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Gagal menghapus kursus: " . mysqli_error($conn);
    }
}
?>
