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

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-sm-9">
                <div class="callout" id="callout" style="display:none">
                  <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                  <span class="message"></span>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?= (!empty($product['photo'])) ? '../assets/image/'.$product['photo'] : 'images/noimage.jpg' ?>" width="100%" class="zoom" data-magnify-src="../assets/image/large-<?= $product['photo'] ?>">
                    <br><br>
                    <form action="../controllers/cart_add.php" method="post" class="form-inline" id="productForm">
                      <div class="form-group">
                        <div class="input-group col-sm-5">		
                          <span class="input-group-btn">
                            <button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
                          </span>
                          <input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
                          <span class="input-group-btn">
                            <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
                            </button>
                          </span>
                          <input type="hidden" value="<?= $product['id'] ?>" name="product_id">
                        </div>
                        <button type="submit" name="cart_add" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                      </div>
                    </form>
                  </div>
                  <div class="col-sm-6">
                  <a href="accueil.php"><button class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</button></a>
                    <h1 class="page-header">Products of Best Quality</h1>
                    <h3><b>&#36; <?= $product['price'] ?></b></h3>
                    <p><b>Category:</b> <a href="categorys.php?idcat=<?= base64_encode($product['category_id']) ?>"><?= $product['catname'] ?></a></p>
                    <h4><b>Description:</b></h4>
                    <p><?= substr($product['description'], 0, 2000) ?></p>
                  </div>
                </div>
                <br>
              <!-- <div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=microsoft-surface-pro-4-typecover-128-gb" data-numposts="10" width="100%"></div>  -->
              </div>
              
            <!-- cote de page   -->
            <?php include 'includes/cote_page.php' ?>  
          </div>
        </section>    
      </div>
    </div>

    <!-- pied -->
    <?php include './includes/pied_page.php' ?>
  </div>

  <!-- liens script -->
  <?php include './includes/script.php' ?>

</body>
</html>