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

// Récuếrer toutes les cartégories
function getProducts(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM products ORDER BY  rand() LIMIT 0, 6');
    return $req;
}

// Récuếrer toutes les cartégories et tous les products
function getCategoryInProducts($id){
    $db = dbConnect();
    // $req = $db->query('SELECT * FROM products ORDER BY  rand() LIMIT 0, 6');
    // $req = $db->query("SELECT *, products.id AS prodid, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.categoy_id WHERE products.id= ?");
    // $req->execute(array($id));
    // return $req;
    //$req = $db->prepare("SELECT *, products.id AS art, products.name AS artname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id= ?");
    $req = $db->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id = products.category_id WHERE products.id = ?");

    $req->execute(array($id));
    return $req;
}

// Vérifier si le article en cours d'insertion n'existe pas encore 
function getProductExist($slug){
    $db = dbConnect();

    $req = $db->prepare("SELECT * FROM products WHERE slug = ?");
    //SELECT *, COUNT(*) AS numslug FROM products WHERE slug = 'dell-inspiron-15-7000-15-6'
	$req->execute(array($slug));
    return $req;
}

//Recuérer une categorie
function getProduct($id){
    $db = dbConnect();

    // $req = $db->prepare('SELECT * FROM produits WHERE id = ?');
    $req = $db->prepare('SELECT * FROM products WHERE id = ?');
    $req->execute(array($id));
    return $req;
}


//Recuérer une article
function addProduct($category, $name, $description, $slug, $price, $new_filename){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO products(`category_id`,`name`,`description`,`slug`,`price`,`photo`) VALUES(?,?,?,?,?,?)');

    if($req->execute(array($category, $name, $description, $slug, $price, $new_filename)))
        return true;
    else
        return false;
}

//Recuérer une article
function delProduct($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM products WHERE id = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

//modifier un product
function updateProduct($category, $name, $description, $slug, $price, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE products SET category_id = ?, name = ?, description = ?, slug = ?, price = ? WHERE id = ?');

    if($req->execute(array($category, $name, $description, $slug, $price, $id)))
        return true;
    else
        return false;
}

//modifier photo du product
function updateProductPhoto($new_filename, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE products SET photo = ? WHERE id = ?');

    if($req->execute(array($new_filename, $id)))
        return true;
    else
        return false;
}