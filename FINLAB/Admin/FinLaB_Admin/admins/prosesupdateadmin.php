<?php
include_once("config.php");

// Pastikan request dilakukan dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Jika password diisi, update semua data termasuk password
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE admin SET nama = ?, email = ?, password = ? WHERE id_admin = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $nama, $email, $hashed_password, $id);
    } else {
        // Jika password tidak diisi, update hanya nama dan email
        $query = "UPDATE admin SET nama = ?, email = ? WHERE id_admin = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $nama, $email, $id);
    }

    if ($stmt->execute()) {
        // Redirect kembali ke halaman utama setelah update
        header("Location: index.php?status=success");
        exit();
    } else {
        echo "Gagal memperbarui admin!";
    }
} else {
    echo "Akses tidak valid!";
}
?>
