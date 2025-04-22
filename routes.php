<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/AuthController.php'; // Jangan lupa require AuthController!

$productController = new ProductController();
$userController = new UserController();

// Ambil action dan id dari query string, gunakan nilai default jika tidak ada
$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'login':
        $controller = new AuthController();
        $controller->login();  // Menampilkan form login
        break;

    case 'auth_login':
        $controller = new AuthController();
        $controller->handleLogin(); // Menangani proses login
        break;

    case 'home':
        include 'views/home.php'; // Halaman utama
        break;
    
    

    // Routing untuk produk
    case 'index':
        $productController->index();
        break;
    case 'create':
        $productController->create();
        break;
    case 'store':
        $productController->store($id);
        break;
    case 'edit':
        $productController->edit($id);
        break;
    case 'update':
        $productController->update($id);
        break;
    case 'delete':
        $productController->delete($id);
        break;

    // Routing untuk user
    case 'user_index':
        $userController->index();
        break;
    case 'user_create':
        $userController->create();
        break;
    case 'user_store':
        $userController->store();
        break;
    case 'user_edit':
        $userController->edit($id);
        break;
    case 'user_update':
        $userController->update($id);
        break;
    case 'user_delete':
        $userController->delete($id);
        break;

    default:
        include 'views/home.php'; // Default halaman jika action tidak ditemukan
        break;
}
?>
