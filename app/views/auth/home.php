<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Inventaris Profesional</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #4f46e5, #0ea5e9, #8b5cf6);
            background-size: 300% 300%;
            animation: gradientFlow 12s ease infinite;
            color: #fff;
        }

        @keyframes gradientFlow {
            0% { background-position: 0% 30%; }
            50% { background-position: 100% 70%; }
            100% { background-position: 0% 30%; }
        }

        /* HEADER */
        .navbar-custom {
            backdrop-filter: blur(12px);
            background: rgba(255,255,255,0.15);
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding: 14px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 22px;
            color: #ffffff !important;
        }

        .nav-link {
            font-weight: 500;
            color: #e0e7ff !important;
            padding: 10px 18px;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        /* HERO CARD */
        .hero-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            padding: 45px;
            border: 1px solid rgba(255,255,255,0.25);
            box-shadow: 0 12px 40px rgba(0,0,0,0.25);
            animation: fadeUp .9s ease-out;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-title {
            font-size: 36px;
            font-weight: 700;
        }

        .hero-sub {
            opacity: .9;
            font-size: 16px;
            margin-top: 8px;
        }

        .feature-list li {
            margin-bottom: 8px;
            font-size: 15px;
            opacity: .95;
        }

        /* BUTTON */
        .btn-modern {
            background: linear-gradient(135deg, #6366f1, #0ea5e9);
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            color: white;
            font-size: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
            transition: .25s ease;
            text-decoration: none;
        }
        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(0,0,0,0.35);
        }

        /* FOOTER */
        .footer {
            margin-top: 80px;
            padding: 45px 0;
            text-align: center;
            color: #ffffffcc;
            font-size: 14px;

            backdrop-filter: blur(12px);
            background: rgba(255,255,255,0.15);
            border-bottom: 1px solid rgba(255,255,255,0.2);
            
        }
    </style>
</head>

<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-boxes-stacked"></i> InventarisX</a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li><a class="nav-link" href="#">Beranda</a></li>
                <li><a class="nav-link" href="#">Fitur</a></li>
                <li><a class="nav-link" href="#">Tentang</a></li>
                <li><a class="nav-link" href="#">Kontak</a></li>
                <li>
                    <a class="btn-modern ms-3" href="?url=login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- MAIN / HERO -->
<div class="container" style="padding-top: 120px; padding-bottom: 40px;">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="hero-card">
                <h2 class="hero-title text-center">Sistem Inventaris Barang Kantor</h2>
                <p class="hero-sub text-center">
                    Didesain dengan teknologi terbaru: cepat, elegan, dan siap mendukung produktivitas.
                </p>

                <h5 class="mt-4 fw-bold">Fitur Unggulan</h5>
                <ul class="feature-list mt-2">
                    <li>🚀 Peminjaman barang cepat & real-time</li>
                    <li>👮 Validasi admin tingkat lanjut</li>
                    <li>📊 Dashboard rekap peminjaman otomatis</li>
                    <li>🔧 Penandaan kondisi (baik/rusak)</li>
                    <li>🧠 Sorting & laporan berbasis kecerdasan sistem</li>
                </ul>

                <div class="text-center mt-4">
                    <a href="?url=login" class="btn-modern">Masuk ke Sistem</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="footer">
    © 2025 InventarisX — Sistem Inventaris Barang Kantor | <a href="https://www.instagram.com/_cndrx/">Follow me</a> 
        
    </Created>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
