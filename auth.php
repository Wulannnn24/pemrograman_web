<?php
function checkLogin() {
    if (!isset($_SESSION['users'])) {
        header("Location: index.php?action=login");
        exit();
    }
}
?>