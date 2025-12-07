<?php $recap = $recap ?? []; ?>

<?php

require_once __DIR__ . '/Model.php';

class Loan extends Model 
{
    // Membuat permintaan peminjaman baru
    public function create($employee_id, $item_id, $quantity)
    {
        $sql = "INSERT INTO loans (employee_id, item_id, quantity) 
                VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$employee_id, $item_id, $quantity]);
    }

    // Mendapatkan semua peminjaman berdasarkan karyawan
    public function byEmployee($employee_id)
    {
        $sql = "SELECT loans.*, items.name AS item_name
                FROM loans
                JOIN items ON loans.item_id = items.id
                WHERE employee_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$employee_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan semua peminjaman lengkap (item + karyawan)
    public function all()
    {
        $sql = "SELECT loans.*, 
                       items.name AS item_name, 
                       employees.name AS employee_name,
                       loans.requested_at
                FROM loans
                JOIN items ON loans.item_id = items.id
                JOIN employees ON loans.employee_id = employees.id
                ORDER BY loans.requested_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mencari peminjaman berdasarkan ID
    public function find($id)
    {
        $sql = "SELECT * FROM loans WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mengubah status peminjaman
    public function updateStatus($id, $status)
    {
        $sql = "UPDATE loans 
                SET status = ?, processed_at = NOW() 
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$status, $id]);
    }

    // Menghapus peminjaman
    public function delete($id)
    {
        $sql = "DELETE FROM loans WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    // Mendapatkan semua data peminjaman + detail item + detail karyawan
  public function getRecap($start = null, $end = null) {
    $sql = "SELECT e.name AS employee_name,
                   i.name AS item_name,
                   SUM(l.quantity) AS quantity
            FROM loans l
            JOIN employees e ON l.employee_id = e.id
            JOIN items i ON l.item_id = i.id
            WHERE 1";

    $params = [];

    if ($start) {
        $sql .= " AND l.loan_date >= ?";
        $params[] = $start;
    }
    if ($end) {
        $sql .= " AND l.loan_date <= ?";
        $params[] = $end;
    }

    $sql .= " GROUP BY e.name, i.name";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}

