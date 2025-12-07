<?php require __DIR__.'/../layout/header.php'; ?>

<style>
/* ====== DASHBOARD PAGE STYLE ====== */
.dashboard {
  background-color: var(--white);
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  max-width: 900px;
  margin: 40px auto;
}

.dashboard h3 {
  margin-top: 0;
  color: var(--primary);
  font-weight: 700;
  font-size: 1.6rem;
  margin-bottom: 10px;
}

.dashboard p {
  color: var(--text-light);
  font-size: 1rem;
  margin-bottom: 20px;
}

/* ====== CARD CONTAINER ====== */
.dashboard-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 20px;
  margin-top: 20px;
}

/* ====== DASHBOARD CARD ====== */
.card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.04);
  transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
  text-decoration: none;
  display: block;
}

.card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 12px rgba(0,0,0,0.08);
  background-color: #f8f9fa;
}

.card h4 {
  color: var(--primary);
  margin: 0 0 8px;
  font-size: 1.1rem;
}

.card p {
  color: var(--text-light);
  font-size: 0.95rem;
}

/* ====== RESPONSIVE ====== */
@media (max-width: 576px) {
  .dashboard {
    padding: 20px;
    margin: 20px;
  }
}
</style>

<div class="dashboard">
  <h3>Admin Dashboard</h3>
  <p>Gunakan menu di bawah untuk navigasi cepat.</p>

  <div class="dashboard-cards">
    <?php if($_SESSION['user']['role'] === 'admin'): ?>
      <a href="?url=admin/items" class="card">
        <h4>📦 Barang</h4>
        <p>Kelola data barang inventaris perusahaan.</p>
      </a>

      <a href="?url=admin/categories" class="card">
        <h4>🏷️ Kategori</h4>
        <p>Atur kategori untuk mengelompokkan barang.</p>
      </a>

      <a href="?url=admin/employees" class="card">
        <h4>👥 Karyawan</h4>
        <p>Data karyawan yang menggunakan sistem.</p>
      </a>

      <a href="?url=admin/loans" class="card">
        <h4>📋 Peminjaman</h4>
        <p>Pantau dan kelola data peminjaman barang.</p>
      </a>

    <?php else: ?>
      <a href="?url=karyawan/items" class="card">
        <h4>📦 Barang</h4>
        <p>Lihat daftar barang yang tersedia untuk dipinjam.</p>
      </a>

      <a href="?url=karyawan/loans" class="card">
        <h4>📋 Peminjaman</h4>
        <p>Kelola dan pantau peminjaman barang Anda.</p>
      </a>
    <?php endif; ?>
  </div>
</div>

<?php require __DIR__.'/../layout/footer.php'; ?>
