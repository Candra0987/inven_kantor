<?php require __DIR__.'/../layout/header.php'; ?>

<h3>Status Peminjaman</h3>

<?php 
if(isset($_SESSION['success'])){
    echo '<div class="alert alert-success">'.htmlspecialchars($_SESSION['success']).'</div>';
    unset($_SESSION['success']);
} 
if(isset($_SESSION['error'])){
    echo '<div class="alert alert-danger">'.htmlspecialchars($_SESSION['error']).'</div>';
    unset($_SESSION['error']);
} 
?>

<!-- Tambahkan CSS -->
<style>
    h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-family: Arial, sans-serif;
    }

    table.table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
    }

    table.table th, table.table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table.table th {
        background-color: #007bff;
        color: white;
    }

    table.table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table.table tr:hover {
        background-color: #ddd;
    }

    .btn {
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 5px;
        transition: 0.3s;
        font-size: 14px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 10px 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Barang</th>
            <th>Qty</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($loans as $l): ?>
        <tr>
            <td><?=$l['id']?></td>
            <td><?=htmlspecialchars($l['item_name'])?></td>
            <td><?=$l['quantity']?></td>
            <td><?=$l['status']?></td>
            <td>
                <?php if($l['status']=='approved'): ?>
                    <a class='btn btn-sm btn-primary' href='?url=karyawan/returnLoan/<?=$l['id']?>' onclick="return confirm('Kembalikan?')">Kembalikan</a>
                <?php else: ?> 
                    - 
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__.'/../layout/footer.php'; ?>
