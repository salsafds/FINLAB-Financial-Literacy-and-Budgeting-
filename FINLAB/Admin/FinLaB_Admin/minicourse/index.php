<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINLAB - Financial Literacy and Budgeting</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; text-align: center; padding: 20px; }
        h1, h2 { color: #333; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 20px auto; }
        input, select, textarea, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        button { background: #007bff; color: white; cursor: pointer; border: none; }
        button:hover { background: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; }
        .delete-btn, .edit-btn { background: red; color: white; border: none; padding: 5px 10px; cursor: pointer; }
        .edit-btn { background: orange; }
    </style>
</head>
<body>
    <h1>FINLAB</h1>
    <h2>Financial Literacy and Budgeting</h2>

    <div class="container">
        <h2>Daftar Kursus</h2>
        <a href="tambahcourse.php"><button>Tambah Kursus</button></a>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Link Video</th>
                    <th>Tingkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM tb_course";
                $hasil = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($hasil)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                    echo "<td><a href='" . htmlspecialchars($row['url_video']) . "' target='_blank'>Tonton</a></td>";
                    echo "<td>" . htmlspecialchars($row['level']) . "</td>";
                    echo "<td>
                            <a href='updatecourse.php?id=" . $row['id_course'] . "' class='edit-btn'>Edit</a>
                            <a href='hapuscourse.php?id=" . $row['id_course'] . "' class='delete-btn' onclick=\"return confirm('Apakah Anda yakin ingin menghapus kursus ini?')\">Hapus</a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
