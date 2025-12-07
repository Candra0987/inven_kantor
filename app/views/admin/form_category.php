<?php require __DIR__.'/../layout/header.php'; ?>

<style>
/* ====== PROFESSIONAL CATEGORY FORM STYLE ====== */
body {
    background-color: #f4f6f8;
    font-family: 'Inter', 'Segoe UI', sans-serif;
    color: #212529;
}

/* Wrapper utama */
.container-category {
    max-width: 640px;
    margin: 60px auto;
}

/* Kartu form */
.category-card {
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.category-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
}

/* Header */
.category-header {
    background: linear-gradient(90deg, #198754, #20c997);
    color: #fff;
    text-align: center;
    padding: 20px 15px;
    font-size: 1.3rem;
    font-weight: 600;
    letter-spacing: 0.3px;
}

/* Body */
.category-body {
    padding: 30px 40px;
}

/* Label dan input */
.form-label {
    font-weight: 600;
    color: #343a40;
    margin-bottom: 6px;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #ced4da;
    padding: 10px 12px;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}

.form-control:focus {
    border-color: #20c997;
    box-shadow: 0 0 0 0.2rem rgba(32, 201, 151, 0.25);
}

/* Tombol */
.btn-success {
    width: 100%;
    border-radius: 10px;
    font-weight: 600;
    padding: 10px 0;
    background: linear-gradient(90deg, #198754, #20c997);
    border: none;
    transition: all 0.25s ease;
}

.btn-success:hover {
    background: linear-gradient(90deg, #157347, #17a98b);
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(25, 135, 84, 0.25);
}

/* Responsif */
@media (max-width: 576px) {
    .category-body {
        padding: 25px;
    }
}
</style>

<div class="container-category">
    <div class="category-card">
        <div class="category-header">
            <?= isset($cat) ? 'Edit Kategori' : 'Tambah Kategori' ?>
        </div>
        <div class="category-body">
            <form method="post" action="?url=admin/categorySave">
                <?php if (isset($cat)): ?>
                    <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input 
                        class="form-control" 
                        name="name" 
                        value="<?= isset($cat) ? htmlspecialchars($cat['name']) : '' ?>" 
                        placeholder="Masukkan nama kategori"
                        required
                    >
                </div>

                <button class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<?php require __DIR__.'/../layout/footer.php'; ?>
