<?php
require_once('../models/category.php');

//récupération de toutes les category à afficher
$Category = getCategories();

//get category
if (isset($_GET['idcat'])) {
    $idcat = htmlspecialchars(base64_decode($_GET['idcat']));
 
    $category = getCategoryProducts($idcat);
    $cat = $category->fetch();
}

//get category
if (isset($_POST['id'])) {
   $id = htmlspecialchars($_POST['id']);

    $category = getCategorie($id);
    echo json_encode($category->fetch(PDO::FETCH_ASSOC));
}

