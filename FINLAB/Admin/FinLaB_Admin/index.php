<?php
include "config.php"; // Koneksi ke database
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard FinLaB</title>

    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: #F5F5F5;
            color: #333;
        }
        .dashboard-container {
            margin-top: 50px;
        }
        .card-custom {
            background: #F2C94C;
            color: #333;
            border-radius: 10px;
        }
        .btn-custom {
            background-color: #F2C94C;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #E6B800;
        }
        .navbar {
            background-color: #1C1C1C;
        }
        .navbar-brand, .nav-link {
            color: #F2C94C !important;
        }
        .card-dark {
            background-color: #1C1C1C;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">FinLaB Admin</a>
</nav>

<div class="container mt-4 text-center">
    <h2>Selamat Datang di Admin Dashboard FinLaB</h2>
    <p>Gunakan menu navigasi untuk mengelola data.</p>

    <a href="artikel/index.php" class="btn btn-custom mt-3">
        <i class="fas fa-newspaper"></i> Kelola Artikel Keuangan
    </a>

    <a href="minicourse/index.php" class="btn btn-custom mt-3">
        <i class="fas fa-video"></i> Mini Course
    </a>

    <a href="admins/index.php" class="btn btn-custom mt-3">
        <i class="fas fa-user-cog"></i> Kelola Akun Admin
    </a>

    <p><a href="../FinLaB_Login/logout.php" class="btn btn-danger mt-3">Logout</a></p>
</div>

<div class="container dashboard-container">
    <h3 class="text-center text-dark mb-4">Statistik FinLaB</h3>

    <div class="row text-center">
        <div class="col-md-4">
            <div class="card card-dark p-4">
                <h5>Total Pengguna</h5>
                <h3 id="totalUsers">0</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark p-4">
                <h5>Total Artikel</h5>
                <h3 id="totalArticles">0</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark p-4">
                <h5>Total Kursus</h5>
                <h3 id="totalCourses">0</h3>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="text-center">Kursus Berdasarkan Level</h5>
                <canvas id="donutChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="text-center">Artikel Berdasarkan Kategori</h5>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("fetch_dashboard.php")
        .then(response => response.json())
        .then(data => {
            document.getElementById("totalUsers").innerText = data.total_users;
            document.getElementById("totalArticles").innerText = data.total_articles;
            document.getElementById("totalCourses").innerText = data.total_courses;

            new Chart(document.getElementById("donutChart"), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(data.levels),
                    datasets: [{
                        data: Object.values(data.levels),
                        backgroundColor: ["#F2C94C", "#E6B800", "#1C1C1C"]
                    }]
                }
            });

            new Chart(document.getElementById("barChart"), {
                type: 'bar',
                data: {
                    labels: Object.keys(data.categories),
                    datasets: [{
                        label: "Jumlah Artikel",
                        data: Object.values(data.categories),
                        backgroundColor: "#E6B800"
                    }]
                }
            });
        });
    });
</script>

</body>
</html>
