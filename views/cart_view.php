<?php include '../controllers/cart_details.php'; ?>

<?php include './includes/tete_page.php'; ?>
<?php include './includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	
	  <div class="content-wrapper">
	    <div class="container">

		<!-- mesg error and success -->
		<?php include 'includes/msg_error_success.php' ?>

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1 class="page-header">YOUR CART</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th></th>
		        				<th>Photo</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th width="25%">Quantity</th>
		        				<th>Subtotal</th>
		        			</thead>
		        			<tbody id="tbody">
								<?= $output ?>
		        			</tbody>
		        		</table>
	        			</div>
	        		</div>
	        		<?php
	        			if(isset($_SESSION['user'])){
	        				echo "
	        					<div id='paypal-button'></div>
								Acheter ici
	        				";
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='./signin.php'>Sign In</a> to checkout.</h4>
	        				";
	        			}
	        		?>
	        	</div>
	        	
	        	<?php include './includes/cote_page.php'; ?>
	        	
	        </div>
	      </section>

	    </div>
	  </div>
  	<?php include './includes/cart_modal.php'; ?>
  	<?php include './includes/pied_page.php'; ?>
</div>

<?php include 'includes/script.php'; ?>

<script>
//quantity cart munis
$(document).on('click', '.minus', function(e){
  e.preventDefault();

  var id = $(this).attr('data-id');  
  var qty = $('#qty_'+id).val();
  if(qty>1){
    qty--;
  }
  $('#qty_'+id).val(qty);
  $.ajax({
    type: 'POST',
    url: '../controllers/cart_update.php',
    data: {
      id: id,
      qty: qty,
    },
    dataType: 'json',
    success: function(data){
      console.log(data);
      if(!data.error){
        getDetails();
        getCart();
        getTotal();
      }
    }
  });
});

$(document).on('click', '.add', function(e){
  e.preventDefault();

  var id = $(this).attr('data-id');
  var qty = $('#qty_'+id).val();
  qty++;
  $('#qty_'+id).val(qty);
  $.ajax({
    type: 'POST',
    url: '../controllers/cart_update.php',
    data: {
      id: id,
      qty: qty,
    },
    dataType: 'json',
    success: function(data){
		console.log(data);
      /*if(!data.data){
        getDetails();
        getCart();
        getTotal();
      }*/
    }
  });
});

getDetails();
getTotal();

function getDetails(){
$.ajax({
  type: 'POST',
  url: '../controllers/cart_details.php',
  dataType: 'json',
  success: function(data){
    $('#sub').empty().append(data.subtotal);
    $('#total').empty().append(data.total);
  }
});
}

function getTotal(){
$.ajax({
  type: 'POST',
  url: '../controllers/cart_total.php',
  dataType: 'json',
  success:function(response){
    total = response;
  }
});
}

</script>
</body>
</html>