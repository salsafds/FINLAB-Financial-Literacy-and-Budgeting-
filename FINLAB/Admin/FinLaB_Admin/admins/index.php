<?php 
    include_once("config.php"); // Koneksi database
    $query = "SELECT * FROM admin ORDER BY tgl_daftar DESC";
    $hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manajemen Admin - FinLaB</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-success text-center">
            <h2>Manajemen Admin</h2>
        </div>

        <!-- Tabel Data Admin -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal Daftar</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor = 1;
                while ($data = mysqli_fetch_array($hasil)) { ?>
                    <tr>
                        <th scope="row"><?php echo $nomor; ?></th>
                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['email']); ?></td>
                        <td><?php echo date("d M Y - H:i", strtotime($data['tgl_daftar'])); ?></td>
                        <td class="text-center">
                            <a href="editadmin.php?id=<?php echo $data['id_admin']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <a href="hapusadmin.php?id=<?php echo $data['id_admin']; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus akun ini?');">
                                Hapus Akun
                            </a>
                        </td>
                    </tr>
                <?php $nomor++; } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap & jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
