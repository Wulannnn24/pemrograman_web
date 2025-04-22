<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // Tampilkan semua user
    public function index() {
        $users = $this->model->getAllUsers();
        include __DIR__ . '/../views/user_list.php';
    }

    // Tampilkan form tambah user
    public function create() {
        $user = null; // agar form bisa digunakan untuk tambah/edit
        include __DIR__ . '/../views/user_form.php';
    }

    // Simpan user baru
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Enkripsi password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Simpan data user
                $this->model->addUser($name, $email, $hashedPassword);

                header("Location: index.php?action=user_index");
                exit;
            } else {
                echo "Lengkapi semua data!";
            }
        }
    }

    // Tampilkan form edit
    public function edit($id) {
        $user = $this->model->getUserById($id);
        include __DIR__ . '/../views/user_form.php';
    }

    // Update data user
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name'], $_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'] ?? null;

                if (empty($name) || empty($email)) {
                    echo "Nama atau email tidak boleh kosong!";
                    return;
                }

                // Jika password diisi, update password juga
                if (!empty($password)) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                } else {
                    $hashedPassword = null; // biar tidak diubah
                }

                $this->model->updateUser($id, $name, $email, $hashedPassword);

                header("Location: index.php?action=user_index");
                exit;
            }
        }
    }

    // Hapus user
    public function delete($id) {
        $this->model->deleteUser($id);
        header("Location: index.php?action=user_index");
    }
}
?>
