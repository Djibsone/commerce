<?php
require_once('../models/sale.php'); 

/*if (isset($_GET['id'])){

    $id = $_GET['id'];
    $cartprod = getCartProduits($id);
    //foreach ($Produit as $produit);
} 
*/
if (isset($_SESSION['user']['id'])){

    $id = $_SESSION['user']['id'];
    $cartprod = getCartUser($id);
    //foreach ($Produit as $produit);
} 