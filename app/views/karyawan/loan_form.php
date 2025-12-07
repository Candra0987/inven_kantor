<?php require __DIR__.'/../layout/header.php'; ?>

<style>
/* ====== FORM PINJAM BARANG ====== */
.form-container {
  max-width: 500px;
  margin: 40px auto 40px;
  padding: 25px 30px;
  background-color: var(--white);
  border-radius: 12px;
  box-shadow: 0 6px 18px rgba(0,0,0,0.05);
}

.form-container h3 {
  text-align: center;
  font-size: 1.5rem;
  color: var(--primary);
  font-weight: 700;
  margin-bottom: 20px;
}

.form-container label {
  display: block;
  font-weight: 500;
  margin-bottom: 6px;
  color: var(--text);
}

.form-container input[type="number"] {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid var(--border);
  border-radius: 8px;
  font-size: 0.95rem;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-container input[type="number"]:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.25);
  outline: none;
}

.btn-success {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 15px;
  background-color: var(--primary);
  color: var(--white);
  font-weight: 600;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.2s ease, transform 0.1s ease;
}

.btn-success:hover {
  background-color: var(--primary-dark);
  transform: translateY(-1px);
}

/* ====== ALERT ERROR ====== */
.alert-danger {
  background-color: #f8d7da;
  color: #842029;
  border: 1px solid #f5c2c7;
  padding: 10px 12px;
  border-radius: 8px;
  margin-bottom: 15px;
  font-size: 0.9rem;
  text-align: center;
}

/* ====== RESPONSIVE ====== */
@media (max-width: 576px) {
  .form-container {
    margin: 20px 10px 30px;
    padding: 20px 15px;
  }
}
</style>

<div class="form-container">
  <h3>Pinjam: <?= htmlspecialchars($item['name']) ?></h3>

  <?php if(isset($error)): ?>
    <div class="alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" action="?url=karyawan/requestLoan">
    <input type="hidden" name="item_id" value="<?= $item['id'] ?>">

    <label for="quantity">Jumlah</label>
    <input id="quantity" type="number" name="quantity" min="1" max="<?= $item['quantity'] ?>" required>

    <button type="submit" class="btn-success">Ajukan</button>
  </form>
</div>

<?php require __DIR__.'/../layout/footer.php'; ?>
