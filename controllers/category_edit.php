<?php
require_once('../models/category.php');
include '../views/includes/slugify.php';

if(isset($_POST['edit'])){
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $cat_slug = slugify($name);

    $stmt = updateCategorie($name, $cat_slug, $id);
    if ($stmt) {
        $_SESSION['success'] = 'Category updated successfully';
    } else {
        $_SESSION['error'] = 'Error category updated';
    }  
}
else{
    $_SESSION['error'] = 'Fill up edit category form first';
}

header('location: ../views/category.php');
