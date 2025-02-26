<?php
class AuthController {
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function login($email, $password) {


        $modelTaiKhoan = new TaiKhoan();
        return $modelTaiKhoan->checkLogin($email, $password);
    }

    public function register($fullname, $email, $password) {
        $modelTaiKhoan = new TaiKhoan();
        return $modelTaiKhoan->register($fullname, $email, $password);
    }
    
}
