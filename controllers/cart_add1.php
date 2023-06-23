<?php
	require_once('../models/sale.php');

	if(isset($_POST['cart_add'])){
		$product_id = htmlspecialchars($_POST['product_id']);
		//$quantity = htmlspecialchars($_POST['quantity']);
		$quantity = 1;
		$user_id = $_SESSION['user']['id'];

		

		$stmt = getCartUser($product_id);
		$row = $stmt->fetch();

		if($row > 0){
			$_SESSION['error'] = 'Product exist in cart';
		}
		else{
			
			$stmt = addCart($user_id, $product_id, $quantity);

			/*if ($stmt) {
				$_SESSION['success'] = 'Product added to cart';
			} else {
				$_SESSION['success'] = 'Error product added to cart';
			}*/
			
			$retVal = ($stmt) ? $_SESSION['success'] = 'Product added to cart' : $_SESSION['success'] = 'Error product added to cart';

			echo $retVal;
		}	

		header('location: ../views/accueil.php');
	}

?>