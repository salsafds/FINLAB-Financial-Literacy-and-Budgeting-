<?php
include_once("config.php");

// Ambil ID artikel dari URL
$id = $_GET['id'];
$query = "SELECT * FROM tb_artikel WHERE id_artikel = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika artikel tidak ditemukan
if (!$data) {
    die("Artikel tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Artikel - FinLaB</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-success text-center">
            <h2>Edit Artikel Keuangan</h2>
        </div>

        <!-- Form Update Artikel -->
        <form method="POST" action="prosesupdateartikel.php">
            <input type="hidden" name="id" value="<?php echo $data['id_artikel']; ?>">

            <!-- Judul Artikel -->
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" name="judul" class="form-control" value="<?php echo htmlspecialchars($data['judul']); ?>" required>
            </div>

            <!-- Konten Artikel -->
            <div class="form-group">
                <label>Konten Artikel</label>
                <textarea name="konten" class="form-control" rows="6" required><?php echo htmlspecialchars($data['konten']); ?></textarea>
            </div>

            <!-- Kategori -->
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo htmlspecialchars($data['kategori']); ?>" required>
            </div>

            <!-- Penulis -->
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="<?php echo htmlspecialchars($data['penulis']); ?>" required>
            </div>

            <!-- Tanggal Dibuat -->
            <div class="form-group">
                <label>Tanggal Dibuat</label>
                <input type="datetime-local" name="tanggal_dibuat" class="form-control"
                       value="<?php echo date('Y-m-d\TH:i', strtotime($data['tanggal_dibuat'])); ?>" required>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            crossorigin="anonymous"></script>

</body>
</html>
