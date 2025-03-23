<?php 
        include_once("config.php");        // Koneksi database
        $query = "SELECT * FROM tb_artikel ORDER BY tanggal_dibuat DESC";
        $hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manajemen Artikel - FinLaB Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-success text-center">
            <h2>Manajemen Artikel Keuangan</h2>
        </div>

        <!-- Tombol Tambah Artikel -->
        <a href="addartikel.php" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Artikel
        </a>

        <!-- Tabel Data Artikel -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor = 1;
                while ($data = mysqli_fetch_array($hasil)) { ?>
                    <tr>
                        <th scope="row"><?php echo $nomor; ?></th>
                        <td><?php echo htmlspecialchars($data['judul']); ?></td>
                        <td><?php echo htmlspecialchars($data['kategori']); ?></td>
                        <td><?php echo htmlspecialchars($data['penulis']); ?></td>
                        <td><?php echo date("d M Y - H:i", strtotime($data['tanggal_dibuat'])); ?></td>
                        <td class="text-center">
                            <a href="updateartikel.php?id=<?php echo $data['id_artikel']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <a href="hapusartikel.php?id=<?php echo $data['id_artikel']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus artikel ini?');">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php $nomor++; } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap & jQuery Scripts -->
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
