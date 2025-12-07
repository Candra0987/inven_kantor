<?php require __DIR__.'/../layout/header.php'; ?>

<style>
/* ====== PAGE HEADER ====== */
.page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 40px auto 20px;
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
  transition: background-color 0.2s ease, transform 0.1s ease;
}

.btn-success:hover {
  background-color: var(--primary-dark);
  transform: translateY(-1px);
}

/* ====== TABLE WRAPPER ====== */
.table-wrapper {
  max-width: 1000px;
  margin: 0 auto 60px;
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
  font-family: inherit;
}

thead {
  background-color: var(--primary);
  color: #fff;
}

th, td {
  padding: 14px 16px;
  text-align: left;
  border-bottom: 1px solid var(--border);
  font-size: 0.95rem;
}

tr:hover {
  background-color: #f9f9f9;
}

/* ====== BUTTONS ====== */
.btn-sm {
  padding: 6px 12px;
  border-radius: 6px;
  font-size: 0.85rem;
  text-decoration: none;
  color: #fff;
  font-weight: 500;
  margin-right: 4px;
  display: inline-block;
  transition: background-color 0.2s ease, transform 0.1s ease;
}

.btn-primary {
  background-color: #0d6efd;
}

.btn-primary:hover {
  background-color: #0b5ed7;
  transform: translateY(-1px);
}

.btn-danger {
  background-color: #dc3545;
}

.btn-danger:hover {
  background-color: #bb2d3b;
  transform: translateY(-1px);
}

/* ====== RESPONSIVE ====== */
@media (max-width: 768px) {
  .page-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
    margin: 20px;
  }

  .table-wrapper {
    margin: 10px 20px 40px;
  }

  th, td {
    padding: 10px 12px;
    font-size: 0.9rem;
  }
}
</style>

<div class="page-header">
  <h3>Karyawan</h3>
  <a class="btn-success" href="?url=admin/employeeForm">+ Tambah</a>
</div>

<div class="table-wrapper">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($emps as $e): ?>
        <tr>
          <td><?= $e['id'] ?></td>
          <td><?= htmlspecialchars($e['name']) ?></td>
          <td><?= htmlspecialchars($e['email']) ?></td>
          <td><?= ucfirst($e['role']) ?></td>
          <td>
            <a class="btn-sm btn-primary" href="?url=admin/employeeForm&id=<?= $e['id'] ?>">Edit</a>
            <a class="btn-sm btn-danger" href="?url=admin/employeeDelete&id=<?= $e['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__.'/../layout/footer.php'; ?>
