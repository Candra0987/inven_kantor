<?php require __DIR__.'/../layout/header.php'; ?>

<!-- 🌿 Tema Hijau Putih -->
<style>
    body {
        background: #f3f7f4;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 60px;
    }

    h3 {
        text-align: center;
        color: #2e7d32;
        font-weight: 600;
        margin-bottom: 30px;
    }

    form {
        background: #fff;
        padding: 30px 25px;
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        animation: fadeIn 0.7s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-control, .form-select {
        border-radius: 8px;
        padding: 10px 12px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #43cea2;
        box-shadow: 0 0 8px rgba(67, 206, 162, 0.3);
        outline: none;
    }

    .btn-success {
        width: 100%;
        border-radius: 8px;
        padding: 10px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        color: white;
        background: linear-gradient(90deg, #43cea2, #2ecc71);
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        background: linear-gradient(90deg, #2ecc71, #43cea2);
    }

    .mb-3 {
        margin-bottom: 20px !important;
    }

    /* Tambahan halus */
    select.form-select {
        cursor: pointer;
    }
</style>

<h3><?= isset($emp)?'Edit':'Tambah'?> Karyawan</h3>
<form method='post' action='?url=admin/employeeSave'>
    <?php if(isset($emp)): ?>
        <input type='hidden' name='id' value='<?=$emp['id']?>'>
    <?php endif; ?>
    <div class='mb-3'>
        <label class='form-label'>Nama</label>
        <input class='form-control' name='name' value='<?=isset($emp)?htmlspecialchars($emp['name']):''?>' required>
    </div>
    <div class='mb-3'>
        <label class='form-label'>Email</label>
        <input class='form-control' name='email' value='<?=isset($emp)?htmlspecialchars($emp['email']):''?>' required>
    </div>
    <?php if(!isset($emp)): ?>
    <div class='mb-3'>
        <label class='form-label'>Password</label>
        <input class='form-control' name='password' type='password' required>
    </div>
    <?php endif; ?>
    <div class='mb-3'>
        <label class='form-label'>Role</label>
        <select class='form-select' name='role'>
            <option value='karyawan'>Karyawan</option>
            <option value='admin'>Admin</option>
        </select>
    </div>
    <button class='btn btn-success'>Simpan</button>
</form>

<?php require __DIR__.'/../layout/footer.php'; ?>
