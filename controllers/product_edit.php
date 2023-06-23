<?php
require_once('../models/product.php');
include '../views/includes/slugify.php';

if(isset($_POST['edit'])){
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $slug = slugify($name);
    $category = htmlspecialchars($_POST['category']);
    $price = htmlspecialchars($_POST['price']);
    $description = htmlspecialchars($_POST['description']);

    $stmt = updateProduct($category, $name, $description, $slug, $price, $id);
    if ($stmt) {
        $_SESSION['success'] = 'Product updated successfully';
    } else {
        $_SESSION['error'] = 'Error product updated';
    }  
}
else{
    $_SESSION['error'] = 'Fill up edit product form first';
}

header('location: ../views/products.php');
