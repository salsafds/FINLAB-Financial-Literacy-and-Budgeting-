<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Artikel - FinLaB Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="alert alert-success text-center">
            <h2>Tambah Artikel Keuangan</h2>
        </div>

        <form method="post" action="prosesaddartikel.php">
            <!-- Judul Artikel -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Artikel</label>
                <div class="col-sm-6">
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Artikel" required>
                </div>
            </div>

            <!-- Konten Artikel -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Konten</label>
                <div class="col-sm-6">
                    <textarea name="konten" class="form-control" rows="5" placeholder="Masukkan Konten Artikel" required></textarea>
                </div>
            </div>

            <!-- Kategori -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-6">
                    <input type="text" name="kategori" class="form-control" placeholder="Masukkan Kategori" required>
                </div>
            </div>

            <!-- Penulis -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penulis</label>
                <div class="col-sm-6">
                    <input type="text" name="penulis" class="form-control" placeholder="Masukkan Nama Penulis" required>
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Tambah Artikel</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap & jQuery -->
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
