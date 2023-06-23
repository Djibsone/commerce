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
function getCategories(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM category ');
    return $req;
}

// Vérifier si la category en cours d'insertion n'existe pas encore 
function getCategoryExist($name){
    $db = dbConnect();

    $req = $db->prepare("SELECT * FROM category WHERE `name` = ?");
	$req->execute(array($name));

    return $req;
}

//Recuérer une categorie
function getCategorie($id){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM category WHERE id = ?');
    $req->execute(array($id));

    return $req;
}

// Récuếrer tous les product d'une category donnée
function getCategoryProducts($id){
    $db = dbConnect();

    //$req = $db->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id = products.category_id WHERE category.id = ?");
    $req = $db->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id = products.category_id WHERE category.id = ? ORDER BY  rand()");
    $req->execute(array($id));
    return $req;
}

//Recuérer une categorie
function addCategorie($name, $cat_slug){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO category(`name`,`cat_slug`) VALUES(?,?)');

    if($req->execute(array($name, $cat_slug)))
        return true;
    else
        return false;
}

//Recuérer une categorie
function delCategorie($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM category WHERE id = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

//Recuérer une categorie
function updateCategorie($name, $cat_slug, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE category SET name = ?, cat_slug = ? WHERE id = ?');

    if($req->execute(array($name, $cat_slug, $id)))
        return true;
    else
        return false;
}

