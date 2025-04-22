<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController {
    private $productModel;
    
    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() {
        $product = $this->productModel->getAllProduct();
        include __DIR__ . '/../views/product_list.php';
    }

    public function create() {
        include __DIR__ . '/../views/product_form.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? null;
            $price = $_POST['price'] ?? null;

            if (!$name || !$price) {
                echo "Nama dan harga produk harus diisi.";
                return;
            }

            $this->productModel->addProduct($name, $price);
            header("Location: index.php?action=index"); // ✅ redirect ke daftar produk
        }
    }

    public function edit($id) {
        $product = $this->productModel->getProductById($id);
        include __DIR__ . '/../views/product_form.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $this->productModel->updateProduct($id, $name, $price);
            header("Location: index.php?action=index"); // ✅ redirect ke daftar produk
        }
    }

    public function delete($id) {
        $this->productModel->deleteProduct($id);
        header("Location: index.php?action=index"); // ✅ redirect ke daftar produk
    }
}
?>
