<?php require __DIR__ . '/../../layout/header.php'; ?>
<?php $recap = $recap ?? []; ?>

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
    <?php else: ?>
    <?php foreach ($recap as $r): ?>
    <tr>
        <td><?= htmlspecialchars($r['employee_name']) ?></td>
        <td><?= htmlspecialchars($r['item_name']) ?></td>
        <td><?= $r['quantity'] ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</tbody>
</table>
</div>

<?php require __DIR__ . '/../../layout/footer.php'; ?>
