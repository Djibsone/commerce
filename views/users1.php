<?php 

require '../controllers/get_user.php';
global $i; 

?>


<!-- tête -->
<?php include 'includes/tete_page.php' ?>

<!-- body -->
  	
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- header menu -->
<?php include 'includes/header_menu.php' ?>

<!-- sidebar: style can be found in sidebar.less -->
<?php include 'includes/sidebar.php' ?> 	

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      
      <!-- php session -->
      <?php include 'includes/msg_error_success.php' ?>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>N°</th>
                  <th>Photo</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Date Added</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php foreach($Users as $user) {
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                        $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                        $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        echo "
                          <tr>
                            <td>
                              <img src='".$image."' height='30px' width='30px'>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['id']."'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td>".$row['email']."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>
                              ".$status."
                              ".$active."
                            </td>
                            <td>".date('M d, Y', strtotime($row['created_on']))."</td>
                            <td>
                              <a href='cart.php?user=".$row['id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-search'></i> Cart</a>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>  
  <!-- pied -->
  <?php include 'includes/pied_page.php' ?>
  <?php include 'includes/user_modal.php'; ?>

</div>
<!-- ./wrapper -->

<!-- liens script -->
<?php include 'includes/script.php' ?>

</body>
</html>





///

<?php 
include '../controllers/get_category.php';
include 'includes/session.php';
?>

<!-- tête -->
<?php include 'includes/tete_page.php' ?>

<!-- body -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

  <!-- header -->
  <?php include 'includes/header.php' ?> 

  <div class="content-wrapper">
    <div class="container">

      <!-- Main content -->
        
        <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header"><?= $cat['catname'] ?></h1>
                    <?php foreach($category as $row): ?>
                        <div class='col-sm-4'>
                            <div class='box box-solid'>
                                <div class='box-body prod-body'>
                                    <a href='#'><img src='../assets/image/<?= $row['photo'] ?>' width='100%' height='230px' class='thumbnail'></a>
                                    <h5><a href='product_view.php?id=<?= base64_encode($row['prodid']) ?>'><?= $row['prodname'] ?></a></h5>
                                </div>
                                <div class='box-footer'>
                                    <b>&#36; <?= $row['price'] ?></b>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/cote_page.php'; ?>
	        	</div>
	        </div>
	    </section>
        
    </div>
  </div>

  <!-- pied -->
  <?php include 'includes/pied_page.php' ?>
  </div>

 <!-- liens script -->
 <?php include 'includes/script.php' ?>

</body>
</html>


///
<div class='input-group col-sm-12'>
                        <span class='input-group-btn'>
                            <button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['cartid']."'><i class='fa fa-minus'></i></button>
                        </span>
                        <input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['cartid']."'>
                        <span class='input-group-btn'>
                            <button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['cartid']."'><i class='fa fa-plus'></i></button>
                        </span>
                        </div>

            $subtotal = $row['price'] * intval($_SESSION['quantity'][$row['id']]);



// <!-- Paypal Express -->

/*paypal.Button.render({
    env: 'sandbox', // change for production if app is live,

	client: {
        sandbox:    'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },

    commit: true, // Show a 'Pay Now' button

    style: {
    	color: 'gold',
    	size: 'small'
    },

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: total, 
                        	currency: 'USD' 
                        }
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
			window.location = 'sales.php?pay='+payment.id;
        });
    },

}, '#paypal-button');*/

/*$('#productForm').submit(function(e){
  e.preventDefault();
  var product = $(this).serialize();
  $.ajax({
    type: 'POST',
    url: 'cart_add.php',
    data: product,
    dataType: 'json',
    success: function(response){
      $('#callout').show();
      $('.message').html(response.message);
      if(response.error){
        $('#callout').removeClass('callout-success').addClass('callout-danger');
      }
      else{
      $('#callout').removeClass('callout-danger').addClass('callout-success');
      getCart();
      }
    }
  });
});

function getCart(){
$.ajax({
  type: 'POST',
  url: 'cart_fetch.php',
  dataType: 'json',
  success: function(response){
    $('#cart_menu').html(response.list);
    $('.cart_count').html(response.count);
  }
});
}
*/

