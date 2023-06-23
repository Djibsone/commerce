<?php
require_once('../models/product.php');

if(isset($_POST['delete'])){
    $id = htmlspecialchars($_POST['id']);

    $stmt = delProduct($id);
    if ($stmt) {
        $_SESSION['success'] = 'Product deleted successfully';
    } else {
        $_SESSION['error'] = 'Error product deleted';
    }  
}
else{
    $_SESSION['error'] = 'Select product to delete first';
}

header('location: ../views/products.php');