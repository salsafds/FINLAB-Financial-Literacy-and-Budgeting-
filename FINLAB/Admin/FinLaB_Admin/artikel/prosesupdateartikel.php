<?php
include_once("config.php");

// Pastikan ID dikirim
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("Error: ID artikel tidak ditemukan!");
}

// Ambil data dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$kategori = $_POST['kategori'];
$penulis = $_POST['penulis'];
$tanggal_dibuat = $_POST['tanggal_dibuat'];

// Gunakan prepared statement untuk keamanan
$query = "UPDATE tb_artikel 
          SET judul = ?, konten = ?, kategori = ?, penulis = ?, tanggal_dibuat = ? 
          WHERE id_artikel = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssi", $judul, $konten, $kategori, $penulis, $tanggal_dibuat, $id);
$hasil = $stmt->execute();

if ($hasil) {
    header("Location: index.php?update=success");
} else {
    echo "Update artikel gagal: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
