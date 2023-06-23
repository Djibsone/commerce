<?php 
include "../controllers/get_products.php";
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

      <!-- mesg error and success -->
      <?php include 'includes/msg_error_success.php' ?>
      
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-sm-9">
              <div class='row'>
                <?php foreach($products as $product): ?>
                  <div class='col-sm-4'>
                    <div class='box box-solid'>
                      <div class='box-body prod-body'>
                        <img src='../assets/image/<?= $product['photo'] ?>' width='100%' height='230px' class='thumbnail'>
                        <h5><a href='product_view.php?id=<?= base64_encode($product['id']) ?>'><?= $product['name'] ?></a></h5>
                      </div>
                      <div class='box-footer'>
                        <b>&#36; <?= $product['price'] ?></b>
                        <b style="margin-left:35px"><a href="../controllers/cart_add.php?prodid=<?= base64_encode($product['id']) ?>" class="btn btn-primary btn-sm btn-flat add_cart"><i class="fa fa-shopping-cart"></i></a></b>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              
              <div class='col-sm-4'></div></div> 
              </div>

            <!-- cote de page   -->
            <?php include 'includes/cote_page.php' ?>   
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


