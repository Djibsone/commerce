<?php 
include '../controllers/get_user.php';
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
                  <?php foreach($Users as $user): ?>
                      <tr>
                        <td><?= $i+=1 ?></td>
                        <td>
                          <img src='../assets/photo_user/<?= $user['photo'] ?>' height='30px' width='30px'>
                          <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='<?= $user['id'] ?>'><i class='fa fa-edit'></i></a></span>
                        </td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['firstname'] ?>  <?= $user['lastname'] ?></td>
                        <td>
                          <?= $user['status'] ?>
                        </td>
                        <td><?= date('M d, Y', strtotime($user['created_on'])) ?></td>
                        <td>
                          <!-- <a href='cart_view.php?id=<?= base64_encode($user['id']) ?>' class='btn btn-info btn-sm btn-flat'><i class='fa fa-search'></i> Cart</a> -->
                          <a href='cart.php?id=<?= base64_encode($user['id']) ?>' class='btn btn-info btn-sm btn-flat'><i class='fa fa-search'></i> Cart</a>
                          <button class='btn btn-success btn-sm edit btn-flat' data-id='<?= $user['id'] ?>'><i class='fa fa-edit'></i> Edit</button>
                          <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?= $user['id'] ?>'><i class='fa fa-trash'></i> Delete</button>
                        </td>
                      </tr>
                  <?php endforeach; ?>
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
