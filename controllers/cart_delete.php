<?php
	require_once('../models/sale.php');

	/*if(isset($_POST['delete'])){
		$userid = $_POST['userid'];
		$cartid = $_POST['cartid'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM cart WHERE id=:id");
			$stmt->execute(['id'=>$cartid]);

			$_SESSION['success'] = 'Product deleted from cart';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();

		header('location: cart.php?user='.$userid);
	}*/

	if(isset($_POST['delete'])) {
		$id = $_POST['cartid'];
	
		//supprimer le produit dans le panier (le tableau)
		unset($_SESSION['cart'][$id]);
		$_SESSION['success'] = 'Product deleted successfully';
	
		header('Location: ../views/cart_view.php');
	}

?>