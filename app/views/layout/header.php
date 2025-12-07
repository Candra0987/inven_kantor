<?php if(!session_id()) session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inventaris Barang Kantor </title>

  <style>
  /* ====== GLOBAL STYLE ====== */
  :root {
    --primary: #198754;
    --primary-dark: #157347;
    --danger: #dc3545;
    --text: #212529;
    --text-light: #6c757d;
    --bg: #f8f9fa;
    --white: #ffffff;
    --border: #dee2e6;
  }

  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: 'Segoe UI', Arial, sans-serif;
    background-color: var(--bg);
    color: var(--text);
    padding-top: 70px;
  }

  a {
    text-decoration: none;
    color: var(--text);
    transition: color 0.2s ease-in-out;
  }

  a:hover {
    color: var(--primary);
  }

  /* ====== NAVBAR ====== */
  .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: var(--white);
    border-bottom: 1px solid var(--border);
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    z-index: 1000;
  }

  .navbar-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0.75rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .navbar-brand {
    font-weight: 700;
    font-size: 1.4rem;
    color: var(--primary);
    letter-spacing: 0.4px;
  }

  .nav-links {
    display: flex;
    align-items: center;
    gap: 1.5rem;
  }

  .nav-links a {
    font-weight: 500;
    color: var(--text);
  }

  .nav-links a.text-danger {
    color: var(--danger);
  }

  .nav-links a.text-danger:hover {
    color: #bb2d3b;
  }

  /* User greeting */
  .nav-user {
    font-weight: 500;
    color: var(--text-light);
  }

  /* ====== TOGGLE (MOBILE) ====== */
  .navbar-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: var(--primary);
    cursor: pointer;
  }

  @media (max-width: 768px) {
    .navbar-container {
      flex-wrap: wrap;
    }

    .nav-links {
      width: 100%;
      flex-direction: column;
      align-items: flex-start;
      gap: 1rem;
      padding: 1rem 0;
      border-top: 1px solid var(--border);
      display: none;
    }

    .nav-links.active {
      display: flex;
    }

    .navbar-toggle {
      display: block;
    }

    .nav-user {
      margin-top: 0.5rem;
    }
  }

  /* ====== CONTAINER ====== */
  .container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
  }

  /* ====== FOOTER (optional) ====== */
  footer {
    margin-top: 60px;
    text-align: center;
    color: var(--text-light);
    padding: 20px 0;
    font-size: 0.9rem;
    border-top: 1px solid var(--border);
  }
  </style>

  <script>
  function toggleMenu() {
    document.getElementById('navLinks').classList.toggle('active');
  }
  </script>
</head>

<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a class="navbar-brand" href="?url=dashboard">Inventaris Barang Kantor</a>

      <button class="navbar-toggle" onclick="toggleMenu()">☰</button>

      <div class="nav-links" id="navLinks">
        <?php if(isset($_SESSION['user'])): ?>
          <?php if($_SESSION['user']['role'] === 'admin'): ?>
            <a href="?url=admin/items">Barang</a>
            <a href="?url=admin/categories">Kategori</a>
            <a href="?url=admin/employees">Karyawan</a>
            <a href="?url=admin/loans">Peminjaman</a>
          <?php else: ?>
            <a href="?url=karyawan/items">Barang</a>
            <a href="?url=karyawan/loans">Peminjaman</a>
          <?php endif; ?>

          <span class="nav-user">Hi, <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
          <a href="?url=logout" class="text-danger">Logout</a>
        <?php else: ?>
          
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- Konten halaman -->
