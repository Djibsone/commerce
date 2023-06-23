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
        <!-- <?php echo $cartprod['firstname'].' '.$cartprod['lastname'].'`s Cart' ?> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">Cart</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" id="add" data-id="" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
              <a href="users.php" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Users</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>N°</th>
                  <th>Article Name</th>
                  <th>Quantity</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $i+=1 ?></td>
                        <td><?= $cartprod['name'] ?></td>
                        <td><?= $cartprod['quantity'] ?></td>
                        <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='<?= $cartprod['cartid'] ?>'><i class='fa fa-edit'></i> Edit Quantity</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?= $cartprod['cartid'] ?>'><i class='fa fa-trash'></i> Delete</button>
                        </td>
                    </tr>
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
    <?php include 'includes/cart_modal.php'; ?>

</div>
<!-- ./wrapper -->

 <!-- liens script -->
 <?php include 'includes/script.php' ?>

<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('#add').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getProducts(id);
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getProducts(id){
  $.ajax({
    type: 'POST',
    url: 'products_all.php',
    dataType: 'json',
    success: function(response){
      $('#product').append(response);
      $('.userid').val(id);
    }
  });
}

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'cart_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.cartid').val(response.cartid);
      $('.userid').val(response.user_id);
      $('.productname').html(response.name);
      $('#edit_quantity').val(response.quantity);
    }
  });
}
</script>
</body>
</html>