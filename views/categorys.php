<?php 
include '../controllers/get_category.php';
include 'includes/session.php';
?>

<?php include 'includes/tete_page.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
          <!-- <b>&#36; ".number_format($row['price'], 2)."</b> -->

	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header"><?= $cat['catname'] ?></h1>
		       		<?php

		       			try{
		       			 	$inc = 3;	
						    foreach ($category as $row) {
						    	$image = (!empty($row['photo'])) ? '../assets/image/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product_view.php?id=".base64_encode($row['prodid'])."'>".$row['prodname']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".$row['price']."</b>
												<b style='margin-left:35px'><a href='../controllers/cart_add.php?prodid=".base64_encode($row['prodid'])."' class='btn btn-primary btn-sm btn-flat add_cart'><i class='fa fa-shopping-cart'></i></a></b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

		       		?> 
	        	</div>
	        	
	        	<?php include 'includes/cote_page.php'; ?>
	       
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/script.php'; ?>
</body>
</html>




