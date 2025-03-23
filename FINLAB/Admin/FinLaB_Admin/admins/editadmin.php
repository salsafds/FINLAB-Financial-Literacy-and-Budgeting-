<?php 
include_once("config.php");

// Pastikan parameter ID tersedia
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID admin tidak valid!");
}

$id = $_GET['id'];
$query = "SELECT * FROM admin WHERE id_admin = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika admin tidak ditemukan
if (!$data) {
    die("Admin tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Admin - FinLaB</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-success text-center">
            <h2>Edit Admin</h2>
        </div>

        <!-- Form Update Admin -->
        <form method="POST" action="prosesupdateadmin.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id_admin']); ?>">

            <!-- Nama -->
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" 
                    value="<?php echo isset($data['nama']) ? htmlspecialchars($data['nama']) : ''; ?>" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" 
                    value="<?php echo isset($data['email']) ? htmlspecialchars($data['email']) : ''; ?>" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label>Password (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
