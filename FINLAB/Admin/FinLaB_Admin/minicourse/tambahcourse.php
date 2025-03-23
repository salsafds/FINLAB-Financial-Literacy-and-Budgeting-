<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus</title>
</head>
<body>
    <h2>Tambah Kursus Baru</h2>
    <form action="prosestambahcourse.php" method="POST">
        <label>Judul Kursus:</label>
        <input type="text" name="judul" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea>

        <label>Level:</label>
        <select name="level" required>
            <option value="Pemula">Pemula</option>
            <option value="Menengah">Menengah</option>
            <option value="Keatas">Keatas</option>
        </select>

        <label>URL Video:</label>
        <input type="url" name="url_video" required>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
