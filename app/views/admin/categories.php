<?php require __DIR__ . '/../layout/header.php'; ?>

<!-- CSS internal -->
<style>
.page-container {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.page-header h3 {
    margin: 0;
}

.btn {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
}

.btn-success { background-color: #28a745; }
.btn-primary { background-color: #007bff; }
.btn-danger  { background-color: #dc3545; }

.btn-sm {
    padding: 4px 8px;
    font-size: 12px;
}

table.table {
    width: 100%;
    border-collapse: collapse;
}

table.table th, table.table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table.table th {
    background-color: #f2f2f2;
}

/* Style input pencarian */
.search-input {
    padding: 6px 10px;
    font-size: 14px;
    width: 250px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-bottom: 15px;
}
</style>

<div class="page-container">
  <div class="page-header">
    <h3>Kategori</h3>
    <a class="btn btn-success" href="?url=admin/categoryForm">+ Tambah Kategori</a>
  </div>

  <!-- Input Pencarian Live -->
  <input type="text" id="searchInput" class="search-input" placeholder="Cari kategori...">

  <table class="table" id="categoryTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($categories as $c): ?>
        <tr>
          <td><?= $c['id'] ?></td>
          <td><?= htmlspecialchars($c['name']) ?></td>
          <td>
            <a class="btn btn-primary btn-sm" href="?url=admin/categoryForm&id=<?= $c['id'] ?>">Edit</a>
            <a class="btn btn-danger btn-sm" href="?url=admin/categoryDelete&id=<?= $c['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- JavaScript Live Search -->
<script>
const searchInput = document.getElementById('searchInput');
const table = document.getElementById('categoryTable').getElementsByTagName('tbody')[0];

searchInput.addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    let visibleRows = 0;

    for (let row of table.rows) {
        const nameCell = row.cells[1].textContent.toLowerCase();
        if (nameCell.includes(filter)) {
            row.style.display = '';
            visibleRows++;
        } else {
            row.style.display = 'none';
        }
    }

    // Jika tidak ada yang cocok
    if (visibleRows === 0) {
        if (!document.getElementById('noResult')) {
            const newRow = table.insertRow();
            newRow.id = 'noResult';
            const cell = newRow.insertCell(0);
            cell.colSpan = 3;
            cell.textContent = 'Kategori tidak ditemukan.';
            cell.style.textAlign = 'center';
        }
    } else {
        const noResultRow = document.getElementById('noResult');
        if (noResultRow) noResultRow.remove();
    }
});
</script>

<?php require __DIR__ . '/../layout/footer.php'; ?>
