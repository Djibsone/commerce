<?php
session_start();
// Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=ecom;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

// Récuếrer tous les user
function getSales(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM sales ');
    return $req;
}

// Récuếrer tous les cart et produits
function getSaleUser($id){
    $db = dbConnect();
    
    $req = $db->prepare('SELECT * FROM sales WHERE user_id = ? ORDER BY sales_date DESC');
    $req->execute(array($id));
    return $req;
}

// Récuếrer tous les cart et produits
function getCartUser($id){
    $db = dbConnect();
    
    $req = $db->prepare('SELECT * FROM cart WHERE user_id = ?');
    $req->execute(array($id));
    return $req;
}

//Récupérer un product
function getCart_Product($ids){
    $db = dbConnect();

    if (empty($ids)) {
        // Gérer la situation lorsque $ids est vide
        return false;
    }

    $req = $db->query('SELECT * FROM products WHERE id IN ('.implode(',', $ids). ')');
    return $req;
}

//Recuérer une categorie
function get_Product($id){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM products WHERE id = ?');
    $req->execute(array($id));
    return $req;
}

// Récuếrer toutes les transactions effectuées
function getTransaction($id){
    $db = dbConnect();
    
    $req = $db->prepare('SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id = ?');
    $req->execute(array($id));
    return $req;
}

// Récuếrer tous les cart et produits
function getDetails($id){
    $db = dbConnect();
    
    $req = $db->prepare('SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id = ?');
    $req->execute(array($id));
    return $req;
}

//Recuérer un user
function addCart($user_id, $product_id, $quantity){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO cart(user_id, product_id, quantity) VALUES(?,?,?);');

    if($req->execute(array($user_id, $product_id, $quantity)))
        return true;
    else
        return false;
}

//supprimer un user
function delUser($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM users WHERE id = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

//modifier une user
function updateUser($email, $password, $firstname, $lastname, $address, $contact, $id){
    //function updateUser($post){
    $db = dbConnect();

    $req = $db->prepare('UPDATE users SET email = ?, password = ?, firstname = ?, lastname = ?, address = ?, contact_info = ? WHERE id = ?');

    if($req->execute(array($email, $password, $firstname, $lastname, $address, $contact, $id)))
    //if($req->execute(array($post['email'], $post['password'], $post['firstname'], $post['lastname'], $post['address'], $post['contact'], $post['photo'], $post['id'])))
        return true;
    else
        return false;
}