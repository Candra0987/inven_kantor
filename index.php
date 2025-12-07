<?php
session_start();

require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';
require_once __DIR__ . '/app/controllers/KaryawanController.php';

$url = $_GET['url'] ?? 'home';
$parts = explode('/', $url);

$controller = $parts[0];
$action = $parts[1] ?? null;

switch($controller){

    // ===== PUBLIC HOME PAGE =====
    case 'home':
        $auth = new AuthController();
        $auth->home();
        break;

    // ===== AUTH =====
    case 'login':
        $auth = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->login();
        } else {
            $auth->loginForm();
        }
        break;

    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    // ===== DASHBOARD =====
    case 'dashboard':
        if (!isset($_SESSION['user'])) {
            header('Location:?url=login');
            exit;
        }

        if ($_SESSION['user']['role'] === 'admin') {
            $admin = new AdminController();
            $admin->dashboard();
        } else {
            $k = new KaryawanController();
            $k->dashboard();
        }
        break;

    // ===== ADMIN =====
    case 'admin':
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location:?url=login');
            exit;
        }

        $admin = new AdminController();
        $action = $parts[1] ?? 'dashboard';

        if ($action === 'dashboard') $admin->dashboard();

        if ($action === 'categories') $admin->categories();
        if ($action === 'categoryForm') $admin->categoryForm();
        if ($action === 'categorySave' && $_SERVER['REQUEST_METHOD'] === 'POST') $admin->categorySave();
        if ($action === 'categoryDelete') $admin->categoryDelete();

        if ($action === 'items') $admin->items();
        if ($action === 'itemForm') $admin->itemForm();
        if ($action === 'itemSave' && $_SERVER['REQUEST_METHOD'] === 'POST') $admin->itemSave();
        if ($action === 'itemDelete') $admin->itemDelete();

        if ($action === 'employees') $admin->employees();
        if ($action === 'employeeForm') $admin->employeeForm();
        if ($action === 'employeeSave' && $_SERVER['REQUEST_METHOD'] === 'POST') $admin->employeeSave();
        if ($action === 'employeeDelete') $admin->employeeDelete();

        if ($action === 'loans') $admin->loans();
        if ($action === 'validateLoan' && $_SERVER['REQUEST_METHOD'] === 'POST') $admin->validateLoan();
        if ($action === 'loanDelete') $admin->loanDelete();

        // ===== NEW FEATURE =====
        if ($action === 'recapLoans') $admin->recapLoans();
        if ($action === 'updateCondition' && $_SERVER['REQUEST_METHOD'] === 'POST') $admin->updateCondition();

        break;

    // ===== KARYAWAN =====
    case 'karyawan':
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'karyawan') {
            header('Location:?url=login');
            exit;
        }

        $k = new KaryawanController();
        $action = $parts[1] ?? 'dashboard';

        if ($action === 'dashboard') $k->dashboard();
        if ($action === 'items') $k->items();
        if ($action === 'loanForm') $k->loanForm();
        if ($action === 'requestLoan' && $_SERVER['REQUEST_METHOD'] === 'POST') $k->requestLoan();
        if ($action === 'loans') $k->loans();
        if ($action === 'returnLoan' && isset($parts[2])) $k->returnLoan(intval($parts[2]));

        break;


    default:
        header('Location:?url=home');
        break;
}
