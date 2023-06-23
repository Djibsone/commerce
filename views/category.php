<?php 
include '../controllers/get_category.php';
include 'includes/session.php';
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
        Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Products</li>
        <li class="active">Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- mesg error and success -->
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
                  <th>Category Name</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                    <?php foreach($Category as $category): ?>
                      <tr>
                        <td><?= $i+=1 ?></td>
                        <td><?= $category['name'] ?></td>
                        <td>
                          <button type="button" class='btn btn-success btn-sm edit btn-flat' data-id='<?= $category['id'] ?>'><i class='fa fa-edit'></i> Edit</button>
                          <button type="button" class='btn btn-danger btn-sm btn-delete btn-flat' data-id='<?= $category['id'] ?>'><i class='fa fa-trash'></i> Delete</button>
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
  <?php include 'includes/category_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/script.php'; ?>

</body>
</html>
