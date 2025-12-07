<?php
require_once __DIR__ . '/Model.php';
class Employee extends Model {
    public function findByEmail($email){ $stmt=$this->pdo->prepare('SELECT * FROM employees WHERE email = ?'); $stmt->execute([$email]); return $stmt->fetch(PDO::FETCH_ASSOC); }
    public function find($id){ $stmt=$this->pdo->prepare('SELECT * FROM employees WHERE id = ?'); $stmt->execute([$id]); return $stmt->fetch(PDO::FETCH_ASSOC); }
    public function all(){ return $this->pdo->query('SELECT * FROM employees')->fetchAll(PDO::FETCH_ASSOC); }
    public function create($data){ $stmt=$this->pdo->prepare('INSERT INTO employees (name,email,password,role) VALUES (?,?,?,?)'); $stmt->execute([$data['name'],$data['email'],$data['password'],$data['role']]); return $this->pdo->lastInsertId(); }
    public function update($id,$data){ $stmt=$this->pdo->prepare('UPDATE employees SET name=?,email=?,role=? WHERE id=?'); $stmt->execute([$data['name'],$data['email'],$data['role'],$id]); }
    public function delete($id){ $stmt=$this->pdo->prepare('DELETE FROM employees WHERE id=?'); $stmt->execute([$id]); }
}
