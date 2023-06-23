<?php
require_once('../models/product.php');

//récupération de tous les produit à afficher
$products = getProducts();

//récupération d'un produit à afficher à partir de son id
if (isset($_GET['id'])){

    $id = htmlspecialchars(base64_decode($_GET['id']));
    $check = getCategoryInProducts($id);
    $product = $check->fetch();
} 

//récupération d'un produit à afficher à partir de son id
if (isset($_POST['id'])){
    $id = htmlspecialchars($_POST['id']);

    $product = getCategoryInProducts($id);
    //$product = getProduct($id);
    echo json_encode($product->fetch(PDO::FETCH_ASSOC));
}
