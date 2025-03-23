<?php
include_once("config.php"); // Koneksi ke database

// Ambil ID artikel dari parameter URL
$id = $_GET['id'];

// Query untuk menghapus artikel berdasarkan ID
$query = "DELETE FROM tb_artikel WHERE id_artikel = $id";
$hasil = mysqli_query($conn, $query);

// Cek apakah proses hapus berhasil
if ($hasil) {
    header('Location: index.php?status=sukses'); // Redirect ke halaman utama dengan status sukses
} else {
    echo "Hapus Artikel Gagal";
}
?>
