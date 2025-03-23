<?php
include "config.php"; // Koneksi ke database
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($nama) || empty($email) || empty($password)) {
        $error = "Semua kolom harus diisi!";
    } elseif (strlen($password) < 8) {
        $error = "Password harus minimal 8 karakter!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid!";
    } else {
        // Hashing password sebelum disimpan ke database
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah email sudah terdaftar
        $check_email = $conn->prepare("SELECT id_admin FROM admin WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $check_email->store_result();

        if ($check_email->num_rows > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            // Simpan data ke database
            $stmt = $conn->prepare("INSERT INTO admin (nama, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama, $email, $password_hash);

            if ($stmt->execute()) {
                header("Location: ../FinLaB_Admin/index.php");
                exit();
            } else {
                $error = "Registrasi gagal, coba lagi!";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinLaB - Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800">Daftar ke FinLaB</h2>
        <?php if ($error): ?>
            <p class="mt-2 text-center text-red-500"><?= $error ?></p>
        <?php endif; ?>
        <form action="" method="POST" class="mt-6">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            <button type="submit" class="w-full px-4 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition duration-300">Daftar</button>
        </form>
        <p class="mt-4 text-sm text-center text-gray-600">Sudah punya akun? <a href="login.php" class="text-blue-600">Login</a></p>
    </div>
</body>
</html>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
            crossorigin="anonymous"></script>
</body>
</html>
