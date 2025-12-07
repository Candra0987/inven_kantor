<?php

require_once __DIR__ . '/../models/Employee.php';
class AuthController {
    protected $employeeModel;
    public function __construct(){ $this->employeeModel = new Employee(); }
    public function loginForm(){ require __DIR__ . '/../views/auth/login.php'; }
    public function login(){ $email = $_POST['email'] ?? ''; $pass = $_POST['password'] ?? ''; $user = $this->employeeModel->findByEmail($email); if($user && password_verify($pass,$user['password'])){ $_SESSION['user']=$user; header('Location:?url=dashboard'); exit; } $error='Email atau password salah'; require __DIR__ . '/../views/auth/login.php'; }
    public function logout(){ session_destroy(); header('Location:?url=login'); exit; }
    public function home()
{
    require __DIR__ . '/../../app/views/auth/home.php';
}

}
