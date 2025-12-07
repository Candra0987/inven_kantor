<?php require __DIR__.'/../layout/header.php'; ?>

<style>
/* ====== FORM PAGE STYLE ====== */
.form-container {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 14px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  max-width: 700px;
  margin: 50px auto;
  padding: 40px;
}

.form-container h3 {
  margin-top: 0;
  color: var(--primary);
  font-weight: 700;
  font-size: 1.6rem;
  text-align: center;
  margin-bottom: 25px;
}

/* ====== FORM ELEMENTS ====== */
.form-group {
  margin-bottom: 20px;
}

.form-label {
  display: block;
  font-weight: 600;
  margin-bottom: 6px;
  color: var(--text);
}

.form-control,
.form-select,
textarea {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid var(--border);
  border-radius: 10px;
  font-size: 1rem;
  font-family: inherit;
  color: var(--text);
  outline: none;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-control:focus,
.form-select:focus,
textarea:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.2);
}

/* ====== BUTTON ====== */
.btn-success {
  display: block;
  width: 100%;
  background: var(--primary);
  color: #fff;
  border: none;
  border-radius: 10px;
  padding: 12px 0;
  font-weight: 600;
  cursor: pointer;
  font-size: 1rem;
  transition: background-color 0.2s ease, transform 0.1s ease;
}

.btn-success:hover {
  background-color: var(--primary-dark);
  transform: translateY(-1px);
}

/* ====== RESPONSIVE ====== */
@media (max-width: 576px) {
  .form-container {
    padding: 25px;
    margin: 20px;
  }
}
</style>

<div class="form-container">
  <h3><?= isset($item) ? 'Edit Barang' : 'Tambah Barang' ?></h3>

  <form method="post" action="?url=admin/itemSave">
    <?php if (isset($item)): ?>
      <input type="hidden" name="id" value="<?= $item['id'] ?>">
    <?php endif; ?>

    <!-- KATEGORI -->
    <div class="form-group">
      <label class="form-label">Kategori</label>
      <select class="form-select" name="category_id" required>
        <?php foreach ($categories as $cat): ?>
          <option value="<?= $cat['id'] ?>" 
            <?= (isset($item) && $item['category_id'] == $cat['id']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($cat['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- NAMA BARANG -->
    <div class="form-group">
      <label class="form-label">Nama</label>
      <input 
        class="form-control" 
        name="name" 
        value="<?= isset($item) ? htmlspecialchars($item['name']) : '' ?>" 
        placeholder="Masukkan nama barang" 
        required
      >
    </div>

    <!-- JUMLAH -->
    <div class="form-group">
      <label class="form-label">Jumlah</label>
      <input 
        class="form-control" 
        type="number" 
        name="quantity" 
        value="<?= isset($item) ? $item['quantity'] : 1 ?>" 
        min="0" 
        required
      >
    </div>

    <!-- KONDISI BARANG -->
    <div class="form-group">
      <label class="form-label">Kondisi Barang</label>
      <select class="form-select" name="condition" required>
        <option value="bagus" <?= (isset($item) && $item['condition']=='bagus') ? 'selected' : '' ?>>Bagus</option>
        <option value="rusak" <?= (isset($item) && $item['condition']=='rusak') ? 'selected' : '' ?>>Rusak</option>
      </select>
    </div>

    <!-- DESKRIPSI -->
    <div class="form-group">
      <label class="form-label">Deskripsi</label>
      <textarea 
        class="form-control" 
        name="description" 
        placeholder="Tuliskan deskripsi barang..."><?= isset($item) ? htmlspecialchars($item['description']) : '' ?></textarea>
    </div>

    <!-- BUTTON -->
    <button class="btn-success">💾 Simpan</button>
  </form>
</div>

<?php require __DIR__.'/../layout/footer.php'; ?>
