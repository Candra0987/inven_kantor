<?php

require_once __DIR__.'/../models/Category.php';
require_once __DIR__.'/../models/Item.php';
require_once __DIR__.'/../models/Employee.php';
require_once __DIR__.'/../models/Loan.php';

class AdminController {
    protected $categoryModel, $itemModel, $employeeModel, $loanModel;

    public function __construct() {
        $this->categoryModel = new Category();
        $this->itemModel = new Item();
        $this->employeeModel = new Employee();
        $this->loanModel = new Loan();

        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location:?url=login');
            exit;
        }
    }

    public function dashboard() {
        require __DIR__.'/../views/admin/dashboard.php';
    }

    public function categories() {
        $categories = $this->categoryModel->all();
        require __DIR__.'/../views/admin/categories.php';
    }

    public function categoryForm() {
        $id = $_GET['id'] ?? null;
        $cat = $id ? $this->categoryModel->find($id) : null;
        require __DIR__.'/../views/admin/form_category.php';
    }

    public function categorySave() {
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';
        if($id) $this->categoryModel->update($id, $name);
        else $this->categoryModel->create($name);
        header('Location:?url=admin/categories');
    }

    public function categoryDelete() {
        $id = $_GET['id'];
        $this->categoryModel->delete($id);
        header('Location:?url=admin/categories');
    }

    public function items() {
        $items = $this->itemModel->all();
        $categories = $this->categoryModel->all();
        require __DIR__.'/../views/admin/items.php';
    }

    public function itemForm() {
        $id = $_GET['id'] ?? null;
        $item = $id ? $this->itemModel->find($id) : null;
        $categories = $this->categoryModel->all();
        require __DIR__.'/../views/admin/form_item.php';
    }

    // ======= BAGIAN UTAMA ITEM SAVE =======
    public function itemSave() {
        $id = $_POST['id'] ?? null;

        // Ambil data dari form, termasuk condition
        $data = [
            'category_id' => $_POST['category_id'],
            'name' => $_POST['name'],
            'quantity' => intval($_POST['quantity']),
            'condition' => $_POST['condition'],  // <<< PENTING: tambahkan ini
            'description' => $_POST['description']
        ];

        if ($id) {
            $this->itemModel->update($id, $data);
        } else {
            $this->itemModel->create($data);
        }

        header('Location:?url=admin/items');
        exit;
    }

    public function itemDelete() {
        $id = $_GET['id'];
        $this->itemModel->delete($id);
        header('Location:?url=admin/items');
    }

    public function employees() {
        $emps = $this->employeeModel->all();
        require __DIR__.'/../views/admin/employees.php';
    }

    public function employeeForm() {
        $id = $_GET['id'] ?? null;
        $emp = $id ? $this->employeeModel->find($id) : null;
        require __DIR__.'/../views/admin/form_employee.php';
    }

    public function employeeSave() {
        $id = $_POST['id'] ?? null;
        if($id) {
            $this->employeeModel->update($id, [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'role' => $_POST['role']
            ]);
        } else {
            $this->employeeModel->create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role' => $_POST['role']
            ]);
        }
        header('Location:?url=admin/employees');
    }

    public function employeeDelete() {
        $id = $_GET['id'];
        $this->employeeModel->delete($id);
        header('Location:?url=admin/employees');
    }

    public function loans() {
        $loans = $this->loanModel->all();
        require __DIR__.'/../views/admin/loans.php';
    }

    public function validateLoan() {
        $id = $_POST['id'];
        $action = $_POST['action'];
        $loan = $this->loanModel->find($id);

        if(!$loan) {
            header('Location:?url=admin/loans');
            exit;
        }

        if($action === 'approve') {
            $item = $this->itemModel->find($loan['item_id']);
            if($item['quantity'] >= $loan['quantity']) {
                $this->loanModel->updateStatus($id,'approved');
                $this->itemModel->decreaseQuantity($loan['item_id'], $loan['quantity']);
            } else {
                $this->loanModel->updateStatus($id,'rejected');
            }
        } else {
            $this->loanModel->updateStatus($id,'rejected');
        }

        header('Location:?url=admin/loans');
    }

    public function loanDelete() {
        $id = $_GET['id'];
        $this->loanModel->delete($id);
        header('Location:?url=admin/loans');
    }

 public function recapLoans() {
    $loan = new Loan();

    // Ambil filter tanggal dari GET jika ada
    $start = $_GET['start'] ?? null;
    $end   = $_GET['end'] ?? null;

    // Ambil data recap
    $recap = $loan->getRecap($start, $end);

    // Load view
    require __DIR__ . '/../../views/admin/recaploans.php';
    
}


    public function updateCondition() {
        $item = new Item();
        $item->updateCondition($_POST['id'], $_POST['kondisi']);
        header('Location:?url=admin/items');
        exit;
    }
}
