<?php
include_once("config.php"); // Koneksi database

// Ambil data dari form
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$kategori = $_POST['kategori'];
$penulis = $_POST['penulis'];

// Query untuk menambahkan artikel
$query = "INSERT INTO tb_artikel (judul, konten, kategori, penulis, tanggal_dibuat) 
          VALUES ('$judul', '$konten', '$kategori', '$penulis', NOW())";

$hasil = mysqli_query($conn, $query);

// Cek apakah berhasil
if ($hasil) {
    header('Location: index.php'); // Redirect ke halaman utama
} else {
    echo "Input data gagal: " . mysqli_error($conn);
}
?>
