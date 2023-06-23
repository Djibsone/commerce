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
function getUsers(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM users ');
    return $req;
}

// Récuếrer tous les sales of user
function getSaleUser($id){
    $db = dbConnect();
    
    $req = $db->prepare('SELECT * FROM sales WHERE user_id = ? ORDER BY sales_date DESC');
    $req->execute(array($id));
    return $req;
}

// Récuếrer tous les details et products
function getDetails($id){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id = ?');
    $req->execute(array($id));
    return $req;
}

// Récuếrer tous les cart et produits
function getCartProducst($id){
    $db = dbConnect();
    
    $req = $db->prepare('SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id= ?');
    $req->execute(array($id));
    $cartProd = $req->fetch();
    return $cartProd;
}


//Recuérer un user
function getUser($id){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute(array($id));

    return $req;
}


//Recuérer un userInfo
function getUserInfo($info){
    $db = dbConnect();

    // $req = $db->prepare("SELECT *, COUNT(*) AS numuser FROM users WHERE email = :email");SELECT * FROM users WHERE email = 'admin@admin.com'
    //$req = $db->prepare("SELECT *, COUNT(*) AS numuser FROM users WHERE email = ?");
    $req = $db->prepare("SELECT * FROM users WHERE email = ?");
	// $req->execute(['email'=>$info]);
    $req->execute(array($info));
    return $req;
}


//Recuérer un user
function addUser($email, $password, $firstname, $lastname){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO users(`email`, `password`, `firstname`, `lastname`) VALUES(?,?,?,?);');

    if($req->execute(array($email, $password, $firstname, $lastname)))
        return true;
    else
        return false;
}

function addUserAdmin($email, $password, $type, $firstname, $lastname, $address, $contact, $filename, $status, $active, $reset, $now){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO users(`email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?);');

    if($req->execute(array($email, $password, $type, $firstname, $lastname, $address, $contact, $filename, $status, $active, $reset, $now)))
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

//modifier info Admin
function updateAdmin($email, $password, $firstname, $lastname, $photo, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE users SET email = ?, password = ?, firstname = ?, lastname = ?, photo = ? WHERE id = ?');

    if($req->execute(array($email, $password, $firstname, $lastname, $photo, $id)))
        return true;
    else
        return false;
}

//modifier photo user
function updateUserPhoto($photo, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE users SET photo = ? WHERE id = ?');

    if($req->execute(array($photo, $id)))
        return true;
    else
        return false;
}

