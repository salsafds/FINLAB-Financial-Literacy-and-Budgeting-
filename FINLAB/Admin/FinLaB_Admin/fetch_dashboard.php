<?php
include "config.php"; // Koneksi ke database

// Hitung jumlah pengguna (Gantilah 'users' dengan tabel pengguna jika ada)
$query_users = mysqli_query($conn, "SELECT COUNT(*) as total FROM admin");
$total_users = mysqli_fetch_assoc($query_users)['total'];

// Hitung jumlah artikel
$query_articles = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_artikel");
$total_articles = mysqli_fetch_assoc($query_articles)['total'];

// Hitung jumlah kursus
$query_courses = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_course");
$total_courses = mysqli_fetch_assoc($query_courses)['total'];

// Hitung kursus berdasarkan level
$query_levels = mysqli_query($conn, "SELECT level, COUNT(*) as jumlah FROM tb_course GROUP BY level");
$levels = [];
while ($row = mysqli_fetch_assoc($query_levels)) {
    $levels[$row['level']] = $row['jumlah'];
}

// Hitung artikel berdasarkan kategori
$query_categories = mysqli_query($conn, "SELECT kategori, COUNT(*) as jumlah FROM tb_artikel GROUP BY kategori");
$categories = [];
while ($row = mysqli_fetch_assoc($query_categories)) {
    $categories[$row['kategori']] = $row['jumlah'];
}

// Format data ke JSON
$data = [
    'total_users' => $total_users,
    'total_articles' => $total_articles,
    'total_courses' => $total_courses,
    'levels' => $levels,
    'categories' => $categories
];

header('Content-Type: application/json');
echo json_encode($data);
?>
