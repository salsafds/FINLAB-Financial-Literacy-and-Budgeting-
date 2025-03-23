<?php
include_once("config.php"); // Koneksi ke database

// Ambil ID artikel dari parameter URL
$id = $_GET['id'];

// Query untuk menghapus artikel berdasarkan ID
$query = "DELETE FROM admin WHERE id_admin = $id";
$hasil = mysqli_query($conn, $query);

// Cek apakah proses hapus berhasil
if ($hasil) {
    header('Location: index.php?status=sukses'); // Redirect ke halaman utama dengan status sukses
} else {
    echo "Hapus Akun Gagal";
}
?>

