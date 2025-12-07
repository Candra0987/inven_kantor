<?php

require_once __DIR__ . '/Model.php';

class Item extends Model 
{
    // Mendapatkan semua item + nama kategori
    public function all()
    {
        $sql = "SELECT items.*, categories.name AS category_name
                FROM items
                JOIN categories ON items.category_id = categories.id";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mencari item berdasarkan ID
    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Membuat item baru
      public function create($data) {

        // ganti key "condition" menjadi "cond" karena reserved keyword
        $data['cond'] = $data['condition'];
        unset($data['condition']);

        $stmt = $this->pdo->prepare("
            INSERT INTO items (category_id, name, quantity, `condition`, description)
            VALUES (:category_id, :name, :quantity, :cond, :description)
        ");

        return $stmt->execute($data);
    }
    // Mengupdate item
  public function update($id, $data) {

    // Perbaiki nama parameter untuk menghindari konflik
    $data['id'] = $id;
    $data['cond'] = $data['condition']; 
    unset($data['condition']); // hapus agar tidak bentrok

    $stmt = $this->pdo->prepare("
        UPDATE items SET
            category_id = :category_id,
            name = :name,
            quantity = :quantity,
            `condition` = :cond,
            description = :description
        WHERE id = :id
    ");

    return $stmt->execute($data);
}


    // Menghapus item
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM items WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Mengurangi stok item
    public function decreaseQuantity($id, $qty)
    {
        $stmt = $this->pdo->prepare("UPDATE items SET quantity = quantity - ? WHERE id = ?");
        $stmt->execute([$qty, $id]);
    }

    // Menambah stok item
    public function increaseQuantity($id, $qty)
    {
        $stmt = $this->pdo->prepare("UPDATE items SET quantity = quantity + ? WHERE id = ?");
        $stmt->execute([$qty, $id]);
    }

    // Mengupdate kondisi item
    public function updateCondition($id, $kondisi)
    {
        // FIXED: sebelumnya memakai $this->db → menyebabkan error
        $stmt = $this->pdo->prepare("UPDATE items SET kondisi = ? WHERE id = ?");
        return $stmt->execute([$kondisi, $id]);
    }
}
