<?php
require_once __DIR__ . '/../config/database.php';
class ProductModel {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAllProduct() {
        $stmt =$this->db->query("SELECT * FROM product");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM product WHERE id=?");
        $stmt->execute ([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addProduct ($name, $price) {
        $stmt =$this->db->prepare("INSERT INTO product (name, price) VALUES (?, ?)");
        return $stmt->execute([$name, $price]);
    }
    public function updateProduct($id, $name, $price) {
        $stmt = $this->db->prepare("UPDATE product SET name=?, price=? WHERE id=?");
        return $stmt->execute([$name, $price, $id]);
    }
    public function deleteProduct($id) {
        $stmt =$this->db->prepare("DELETE FROM product WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>