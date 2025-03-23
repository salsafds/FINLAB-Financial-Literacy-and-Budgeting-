<?php
include "config.php";
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validasi Input
    if (empty($email) || empty($password)) {
        $error = "Email dan Password harus diisi!";
    } else {
        // Ambil data admin berdasarkan email
        $stmt = $conn->prepare("SELECT id_admin, nama, email, password FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Jika email ditemukan di database
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id_admin, $nama, $email, $password_hash);
            $stmt->fetch();

            // Cek apakah password cocok dengan hash
            if (password_verify($password, $password_hash)) {
                // Login berhasil, simpan sesi
                $_SESSION["admin_id"] = $id_admin;
                $_SESSION["admin_nama"] = $nama;
                $_SESSION["admin_email"] = $email;
                header("Location: index.php"); // Redirect ke dashboard
                exit();
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Email tidak ditemukan!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinLaB - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-gray-900 via-yellow-500 to-gray-900">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-center text-gray-700">Login ke FinLaB</h2>
        <?php if ($error): ?>
            <p class="mt-2 text-center text-red-500"><?= $error ?></p>
        <?php endif; ?>
        <form action="" method="POST" class="mt-6">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            <button type="submit" class="w-full px-4 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition duration-300">Login</button>
        </form>
        <p class="mt-4 text-sm text-center text-gray-600">Belum punya akun? <a href="signup.php" class="text-yellow-500">Daftar</a></p>
    </div>
</body>
</html>
