<?php
include 'config.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_course WHERE id_course = $id";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($hasil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus</title>
</head>
<body>
    <h2>Edit Kursus</h2>
    <form action="prosesupdatecourse.php" method="POST">
        <input type="hidden" name="id_course" value="<?= $data['id_course'] ?>">

        <label>Judul Kursus:</label>
        <input type="text" name="judul" value="<?= $data['judul'] ?>" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required><?= $data['deskripsi'] ?></textarea>

        <label>Level:</label>
        <select name="level">
            <option <?= ($data['level'] == 'Pemula') ? "selected" : "" ?> value="Pemula">Pemula</option>
            <option <?= ($data['level'] == 'Menengah') ? "selected" : "" ?> value="Menengah">Menengah</option>
            <option <?= ($data['level'] == 'Keatas') ? "selected" : "" ?> value="Keatas">Keatas</option>
        </select>

        <label>URL Video:</label>
        <input type="url" name="url_video" value="<?= $data['url_video'] ?>" required>

        <button type="submit">Update</button>
    </form>
</body>
</html>
