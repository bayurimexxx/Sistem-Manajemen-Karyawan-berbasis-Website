<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Management Karyawan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">⭐ Peradaban Gemilang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown Login -->
                    <li class="nav-item dropdown">
                        <a class="btn btn-light dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown">
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Admin</a></li>
                            <li><a class="dropdown-item" href="#">Karyawan</a></li>
                            <li><a class="dropdown-item" href="#">Manager</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-white py-5 shadow-sm">
        <div class="container text-center">
            <h1 class="display-4 fw-bold text-primary">Sistem Management Karyawan</h1>
            <p class="lead text-muted">Membantu perusahaan mengatur data pegawai, absensi, dan laporan dengan cepat, aman, dan efisien.</p>
            <a href="#" class="btn btn-primary btn-lg mt-3"><i class="bi bi-box-arrow-in-right"></i> Mulai Sekarang</a>
        </div>
    </header>

    <!-- Fitur -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-people display-4 text-primary"></i>
                            <h5 class="mt-3">Manajemen Pegawai</h5>
                            <p class="text-muted">Mengatur data karyawan, jabatan, dan kehadiran secara terpusat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-calendar-check display-4 text-success"></i>
                            <h5 class="mt-3">Absensi Online</h5>
                            <p class="text-muted">Monitoring absensi karyawan lebih mudah dengan sistem digital.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <i class="bi bi-graph-up display-4 text-warning"></i>
                            <h5 class="mt-3">Laporan Instan</h5>
                            <p class="text-muted">Laporan kinerja dan absensi bisa diakses kapanpun dengan cepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        <p class="mb-0">&copy; {{ date('Y') }} Sistem Management Karyawan - Peradaban Gemilang</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
