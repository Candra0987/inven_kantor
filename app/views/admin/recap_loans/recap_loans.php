<?php require __DIR__ . '/../../layout/header.php'; ?>

<style>
.recap-wrapper {
  max-width: 1100px;
  margin: 30px auto;
  background: #fff;
  padding: 25px;
  border-radius: 12px;
  border: 1px solid var(--border);
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.recap-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary);
  margin-bottom: 20px;
}

.filter-box {
  margin-bottom: 20px;
  display: flex;
  gap: 15px;
}

.filter-box input {
  padding: 8px 12px;
  border: 1px solid var(--border);
  border-radius: 6px;
}

.filter-box button {
  padding: 8px 16px;
  border: none;
  border-radius: 6px;
  background: var(--primary);
  color: #fff;
  cursor: pointer;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 12px 15px;
  border-bottom: 1px solid var(--border);
}

thead {
  background: var(--primary);
  color: white;
}

tr:hover {
  background: #f9f9f9;
}
</style>

<div class="recap-wrapper">
  <div class="recap-title">Rekap Peminjaman</div>

  <!-- FILTER FORM -->
  <form method="get" class="filter-box">
    <input type="hidden" name="page" value="recap_loans">
    
    <input type="date" name="start" value="<?= $_GET['start'] ?? '' ?>">
    <input type="date" name="end" value="<?= $_GET['end'] ?? '' ?>">

    <button type="submit">Filter</button>
  </form>

  <!-- TABLE -->
  <table>
    <thead>
      <tr>
        <th>Karyawan</th>
        <th>Barang</th>
        <th>Total Dipinjam</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($recap)): ?>
        <tr><td colspan="3" style="text-align:center; padding:20px;">Tidak ada data</td></tr>
      <?php endif; ?>

      <?php foreach ($recap as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['employee_name']) ?></td>
        <td><?= htmlspecialchars($r['item_name']) ?></td>
        <td><?= $r['quantity'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/../../layout/footer.php'; ?>
