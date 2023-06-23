<?php
require_once('../models/count.php');

//Compter le nombre de users
$totalUsers = countUsers();

//Compter le nombre de products
$totalProducts = countProducts();

//Compter le nombre de sales
$totalSales = countSales();