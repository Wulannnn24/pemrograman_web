<?php
session_start();
require_once __DIR__ . '/../config/database.php';
include __DIR__ . '/../views/login.php'; // Menampilkan halaman login

class AuthController {
    
public function login() {
        if (isset($_SESSION['users'])) {
            header("Location: index.php?action=home");
            exit();
        }
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Mendapatkan koneksi database
            $db = Database::getInstance();
            $conn = $db->getConnection();

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    header("Location: index.php?action=home");
                    exit();
                } else {
                    $error = "Password salah!";
                }
            } else {
                $error = "Email tidak ditemukan!";
            }
        }

        
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
?>