<?php
require_once('../models/user.php');

//get users all
$Users = getUsers();

//get infos user in session
$check = getUser($_SESSION['user']['id']);
$user = $check->fetch();

//get cart in products of user
if (isset($_GET['id'])){

    $id = htmlspecialchars(base64_decode($_GET['id']));
    $cartprod = getCartProducst($id);
    //foreach ($Produit as $produit);
} 

//get user from id 
if (isset($_POST['id'])) {
$id = htmlspecialchars($_POST['id']);

    $user = getUser($id);
    echo json_encode($user->fetch(PDO::FETCH_ASSOC));
}