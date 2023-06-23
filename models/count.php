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

//Compter le nombre de user
function countUsers() {
    $db = dbConnect();
    $query = "SELECT COUNT(*) AS total_users FROM users";
    $stmt = $db->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_users'];
}

//Compter le nombre de products
function countProducts() {
    $db = dbConnect();
    $query = "SELECT COUNT(*) AS total_products FROM products";
    $stmt = $db->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_products'];
}

//Compter le nombre de sales
function countSales() {
    $db = dbConnect();
    $query = "SELECT COUNT(*) AS total_sales FROM sales";
    $stmt = $db->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_sales'];
}