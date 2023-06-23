<?php
require_once('../models/sale.php');

//creer la session
/*if(!isset($_SESSION['cart'])) {
    //s'il n'exite pas une session on creer une et on mets un tableau a l'interieur
    $_SESSION['cart'] = array();
}

//recuperation l'id dans le lien
if(isset($_GET['prodid'])) {
    $id = htmlspecialchars(base64_decode($_GET['prodid']));
    
    //verifier grace a l'id si le produit existe dans la db
    $check = get_Product($id);
    $data = $check->fetch();
    if (empty($data)) {
    //if ($data === 0) {
		$_SESSION['error'] = 'Product does not exist';
    }

    //ajouter le produit dans le panier (le tableau)
        //si le produit existe dans le panier
    if(isset($_SESSION['cart'][$id])) {
        //represente la quantity
        $_SESSION['cart'][$id]++;
        $_SESSION['success'] = 'Product addeddddd to cart';
        //$_SESSION['error'] = 'Product exist in cart';
    } else {
        //si non on ajoute le produit
        $_SESSION['cart'][$id] = 1;
        $_SESSION['success'] = 'Product added to cart';
    }

    header('location: ../views/accueil.php');
}*/

//<!----------------------------AJAX------------------------------>
//creer la session
if(!isset($_SESSION['cart'])) {
    //s'il n'exite pas une session on creer une et on mets un tableau a l'interieur
    $_SESSION['cart'] = array();
}

//initialize json
$json = array('error' => true);
//recuperation l'id dans le lien
if(isset($_GET['prodid'])) {
    $id = htmlspecialchars(base64_decode($_GET['prodid']));
    
    //verifier grace a l'id si le produit existe dans la db
    $check = get_Product($id);
    $data = $check->fetch();
    if (empty($data)) {
    //if ($data === 0) {
		$json['message'] = 'Product does not exist';
    }

    //ajouter le produit dans le panier (le tableau)
        //si le produit existe dans le panier
    if(isset($_SESSION['cart'][$id])) {
        //$json['error'] = false;
        //represente la quantity
        //$_SESSION['cart'][$id]++;
        //$json['message'] = 'Product added to cart';
        $json['error'] = 'Product exist to cart';
    } else {
        $json['error'] = false;
        //si non on ajoute le produit
        $_SESSION['cart'][$id] = 1;
        $json['message'] = 'Product added to cart';
    }

    echo json_encode($json);
    //header('location: ../views/accueil.php');
}


/*<!----------------------------SUBMIT------------------------------>
//creer la session
if(!isset($_SESSION['cart'])) {
    //s'il n'exite pas une session on creer une et on mets un tableau a l'interieur
    $_SESSION['cart'] = array();
}

//recuperation l'id dans le lien
if (isset($_POST['add_cart'])) {

    if(isset($_POST['product_id'], $_POST['quantity'])) {
        $id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $_SESSION['qty'] = $quantity;

        //verifier grace a l'id si le produit existe dans la db
        $check = get_Product($id);
        $data = $check->fetch();
        if (empty($data)) {
        //if ($data === 0) {
            $_SESSION['error'] = 'Product does not exist';
        }
    
        //ajouter le produit dans le panier (le tableau)
            //si le produit existe dans le panier
        if(isset($_SESSION['cart'][$id])) {
            //represente la quantity
            //$_SESSION['cart'][$id]++;
            //$_SESSION['success'] = 'Product addeddddd to cart';
            $_SESSION['error'] = 'Product exist in cart';
        } else {
            //si non on ajoute le produit
            $_SESSION['cart'][$id] = 1;
            $_SESSION['success'] = 'Product added to cart';
        }
    
        header('location: ../views/accueil.php');
    }
}*/