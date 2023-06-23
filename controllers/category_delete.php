<?php
require_once('../models/category.php');

if(isset($_POST['delete'])){
    $id = htmlspecialchars($_POST['id']);

    $stmt = delCategorie($id);
    if ($stmt) {
        $_SESSION['success'] = 'Category deleted successfully';
    } else {
        $_SESSION['error'] = 'Error category deleted';
    }  
}
else{
    $_SESSION['error'] = 'Select category to delete first';
}

header('location: ../views/category.php');