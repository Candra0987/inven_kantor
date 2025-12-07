<?php require __DIR__.'/../layout/header.php'; ?>

<style>
/* ====== DASHBOARD KARYAWAN STYLE ====== */
.dashboard-header {
  max-width: 900px;
  margin: 40px auto 20px;
  padding: 20px 25px;
  background-color: var(--white);
  border-radius: 12px;
  box-shadow: 0 6px 18px rgba(0,0,0,0.05);
  text-align: center;
}

.dashboard-header h3 {
  font-size: 1.6rem;
  color: var(--primary);
  font-weight: 700;
  margin-bottom: 12px;
}

.dashboard-header p {
  font-size: 1rem;
  color: var(--text-light);
  margin-bottom: 20px;
}

/* ====== QUICK LINKS WITH ICON ====== */
.dashboard-links {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

.dashboard-links a {
  display: inline-flex;
  align-items: center;
  gap: 8px;                    /* jarak antara ikon & teks */
  padding: 12px 22px;
  background-color: var(--primary);
  color: var(--white);
  font-weight: 600;
  border-radius: 10px;
  text-decoration: none;
  transition: background-color 0.2s ease, transform 0.1s ease;
  font-size: 0.95rem;
}

.dashboard-links a:hover {
  background-color: var(--primary-dark);
  transform: translateY(-2px);
}

.dashboard-links a .icon {
  font-size: 1.2rem;
}

@media (max-width: 576px) {
  .dashboard-links {
    flex-direction: column;
    gap: 12px;
  }
}
</style>

<div class="dashboard-header">
  <h3>Dashboard Karyawan</h3>
  <p>Selamat datang.</p>
  <div class="dashboard-links">
    <a href="?url=karyawan/items"><span class="icon">📦</span> Barang</a>
    <a href="?url=karyawan/loans"><span class="icon">📋</span> Peminjaman</a>
  </div>
</div>

<?php require __DIR__.'/../layout/footer.php'; ?>
