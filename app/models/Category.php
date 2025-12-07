<?php
require_once __DIR__ . '/Model.php';
class Category extends Model {
    public function all(){ return $this->pdo->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC); }
    public function find($id){ $stmt=$this->pdo->prepare('SELECT * FROM categories WHERE id=?'); $stmt->execute([$id]); return $stmt->fetch(PDO::FETCH_ASSOC); }
    public function create($name){ $stmt=$this->pdo->prepare('INSERT INTO categories (name) VALUES (?)'); $stmt->execute([$name]); }
    public function update($id,$name){ $stmt=$this->pdo->prepare('UPDATE categories SET name=? WHERE id=?'); $stmt->execute([$name,$id]); }
    public function delete($id){ $stmt=$this->pdo->prepare('DELETE FROM categories WHERE id=?'); $stmt->execute([$id]); }
}
