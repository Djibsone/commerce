<?php
include '../controllers/get_products.php';
include './includes/session.php';
global $i;

?>


<!-- tête -->
<?php include 'includes/tete_page.php' ?>

<!-- body -->
  	
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- header menu -->
<?php include 'includes/header_menu.php' ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product List
    </h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Products</li>
      <li class="active">Product List</li>
    </ol>
  </section>

  <!-- sidebar: style can be found in sidebar.less -->
  <?php include 'includes/sidebar.php' ?> 

<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Admin Profile</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=products.php" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Email</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="email" name="email" value="admin@admin.com">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="Code">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="Projects">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>  

    <!-- Main content -->
    <section class="content">
      
      <!-- mesg error and success -->
      <?php include 'includes/msg_error_success.php' ?>
  
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</a>
                        <div class="pull-right">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>Category: </label>
                                    <select class="form-control input-sm" id="select_category">
                                        <option value="0">ALL</option>
                                        <br/>
                                            <font size='1'>
                                                <table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
                                                    <tr>
                                                        <th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined variable: catid in C:\wamp64\www\Ecommerce\ecommerce\admin\products.php on line <i>73</i></th>
                                                    </tr>
                                                    <tr>
                                                        <th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
                                                    <tr>
                                                        <th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0001</td><td bgcolor='#eeeeec' align='right'>409456</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp64\www\Ecommerce\ecommerce\admin\products.php' bgcolor='#eeeeec'>...\products.php<b>:</b>0</td>
                                                    </tr>
                                                </table>
                                            </font>
                                        <option value='4' >Smart Phones</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>N°</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php foreach($products as $product): ?>  
                                    <tr>
                                      <td><?= $i+=1 ?></td>
                                      <td><?= $product['name'] ?></td>
                                      <td>
                                        <img src='../assets/image/<?= $product['photo'] ?>' height='30px' width='30px'>
                                        <span class='pull-right'><a href='#' class='photo' data-id='<?= $product['id'] ?>'><i class='fa fa-edit'></i></a></span>
                                      </td>
                                      <td><a href='#' class='btn btn-info btn-sm btn-flat desc' data-id='<?= $product['id'] ?>'><i class='fa fa-search'></i> View</a></td>
                                      <!-- <td><?= substr($product['description'], 0, 40) ?> ...</td> -->
                                      <td>&#36; <?= number_format($product['price'], 2) ?></td>
                                      <td>
                                        <button class='btn btn-success btn-sm edit btn-flat' data-id="<?= $product['id'] ?>"><i class='fa fa-edit'></i> Edit</button>
                                        <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?= $product['id'] ?>"><i class='fa fa-trash'></i> Delete</button>
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

<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
              <input type="hidden" class="desid">
              <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Product</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controllers/product_add.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>

                  <label for="category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="category" name="category" required>
                      <option value="" selected>- Select -></option>
                      <?php 
                        $db = dbConnect();
                        $req = $db->query('SELECT * FROM category ');
                        $Category = $req;
                        foreach($Category as $category): 
                      ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                      <?php endforeach; ?>  
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="price" name="price" required>
                  </div>

                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo" onchange="readURL(this);" required>
                  </div>
                  <!-- <div class="col-sm-5">
                    <img id="ig" src="../assets/photo_user/avatar.jpg" alt="your image" style="width: 50%; margin-top: 2px">
                   </div> -->
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="description" rows="10" cols="80" aria-required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controllers/product_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controllers/product_delete.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>DELETE PRODUCT</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Product</b></h4>
            </div>
            <div class="modal-body">
                <form class="form_add form-horizontal" method="POST" action="../controllers/product_edit.php">
                    <input type="hidden" class="prodid" name="id">
                    <div class="form-group">
                        <label for="edit_name" class="col-sm-1 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>

                        <label for="edit_category" class="col-sm-1 control-label">Category</label>

                        <div class="col-sm-5">
                            <select class="form-control" id="edit_category" name="category">
                              <option selected id="catselected"></option>
                              <?php 
                                $db = dbConnect();
                                $req = $db->query('SELECT * FROM category ');
                                $Category = $req;
                                foreach($Category as $category): 
                              ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                              <?php endforeach; ?>  
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_price" class="col-sm-1 control-label">Price</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="edit_price" name="price">
                        </div>
                    </div>
                    <p><b>Description</b></p>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea id="edit_description" name="description" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

  <!-- liens script -->
  <?php include 'includes/script.php' ?>

</body>
</html>
