<?php

require_once __DIR__.'/../models/Item.php';
require_once __DIR__.'/../models/Loan.php';
class KaryawanController {
    protected $itemModel,$loanModel;
    public function __construct(){ $this->itemModel=new Item(); $this->loanModel=new Loan(); if(!isset($_SESSION['user'])){ header('Location:?url=login'); exit; } }
    public function dashboard(){ require __DIR__.'/../views/karyawan/dashboard.php'; }
    public function items(){ $items=$this->itemModel->all(); require __DIR__.'/../views/karyawan/items.php'; }
    public function loanForm(){ $item=$this->itemModel->find($_GET['id']); require __DIR__.'/../views/karyawan/loan_form.php'; }
    public function requestLoan(){ $employee_id=$_SESSION['user']['id']; $item_id=$_POST['item_id']; $qty=intval($_POST['quantity']); $item=$this->itemModel->find($item_id); $error=null; if($qty<=0) $error='Jumlah harus > 0'; elseif($qty>$item['quantity']) $error='Jumlah melebihi stok'; if($error){ $item=$this->itemModel->find($item_id); require __DIR__.'/../views/karyawan/loan_form.php'; return; } $this->loanModel->create($employee_id,$item_id,$qty); header('Location:?url=karyawan/loans'); }
    public function loans(){ $employee_id=$_SESSION['user']['id']; $loans=$this->loanModel->byEmployee($employee_id); require __DIR__.'/../views/karyawan/loans.php'; }
    public function returnLoan($loan_id){ $loan=$this->loanModel->find($loan_id); if(!$loan){ $_SESSION['error']='Peminjaman tidak ditemukan'; header('Location:?url=karyawan/loans'); exit; } if($loan['employee_id']!=$_SESSION['user']['id']){ $_SESSION['error']='Anda tidak berhak'; header('Location:?url=karyawan/loans'); exit; } if($loan['status']!=='approved'){ $_SESSION['error']='Hanya peminjaman disetujui yang bisa dikembalikan'; header('Location:?url=karyawan/loans'); exit; } $this->loanModel->updateStatus($loan_id,'returned'); $this->itemModel->increaseQuantity($loan['item_id'],$loan['quantity']); $_SESSION['success']='Barang dikembalikan'; header('Location:?url=karyawan/loans'); }
}
