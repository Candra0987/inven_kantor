<?php require __DIR__.'/../layout/header.php'; ?>

<style>
.page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 40px auto 10px;
  max-width: 1000px;
}

.page-header h3 {
  margin: 0;
  color: var(--primary);
  font-size: 1.6rem;
  font-weight: 700;
}

.btn-success {
  background-color: var(--primary);
  color: #fff;
  padding: 10px 18px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: 0.2s;
}

.btn-success:hover {
  background-color: var(--primary-dark);
  transform: translateY(-1px);
}

.filter-buttons {
  margin-top: 10px;
  display: flex;
  gap: 10px;
}

.filter-buttons a {
  padding: 8px 14px;
  border-radius: 6px;
  font-weight: 600;
  text-decoration: none;
  color: white;
  font-size: 0.9rem;
}

.table-wrapper {
  max-width: 1000px;
  margin: 20px auto 60px;
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background-color: var(--primary);
  color: #fff;
}

th, td {
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  font-size: 0.95rem;
}

tr:hover {
  background-color: #f9f9f9;
}

.btn-sm {
  padding: 6px 12px;
  border-radius: 6px;
  font-size: 0.85rem;
  text-decoration: none;
  color: #fff;
  font-weight: 500;
  margin-right: 4px;
  transition: 0.2s;
  display: inline-block;
}

.btn-primary { background-color: #0d6efd; }
.btn-danger { background-color: #dc3545; }

.btn-primary:hover { background-color: #0b5ed7; transform: translateY(-1px); }
.btn-danger:hover { background-color: #bb2d3b; transform: translateY(-1px); }

.badge {
  padding: 6px 10px;
  border-radius: 6px;
  color: white;
  font-weight: 600;
}
.badge.bagus { background: #198754; }
.badge.rusak { background: #dc3545; }

@media (max-width: 768px) {
  .page-header { flex-direction: column; align-items: flex-start; margin: 20px; }
  .table-wrapper { margin: 10px 20px 40px; }
}
</style>

<div class="page-header">
  <h3>Barang</h3>
  <a class="btn-success" href="?url=admin/itemForm">+ Tambah Barang</a>
</div>

<!-- FILTER KONDISI -->
<div class="filter-buttons" style="max-width:1000px; margin:auto;">
    <a href="?url=admin/items" style="background:#6c757d;">Semua</a>
    <a href="?url=admin/items&condition=bagus" style="background:#198754;">Bagus</a>
    <a href="?url=admin/items&condition=rusak" style="background:#dc3545;">Rusak</a>
</div>

<div class="table-wrapper">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Qty</th>
        <th>Kondisi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($items as $it): ?>
        <tr>
          <td><?= $it['id'] ?></td>
          <td><?= htmlspecialchars($it['name']) ?></td>
          <td><?= htmlspecialchars($it['category_name']) ?></td>
          <td><?= $it['quantity'] ?></td>
          
          <!-- Badge kondisi -->
          <td>
            <span class="badge <?= $it['condition'] ?>">
                <?= ucfirst($it['condition']) ?>
            </span>
          </td>

          <td>
            <a class="btn-sm btn-primary" href="?url=admin/itemForm&id=<?= $it['id'] ?>">Edit</a>
            <a class="btn-sm btn-danger" href="?url=admin/itemDelete&id=<?= $it['id'] ?>" onclick="return confirm('Hapus barang ini?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__.'/../layout/footer.php'; ?>
