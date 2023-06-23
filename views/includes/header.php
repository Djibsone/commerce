<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="../" class="navbar-brand"><b>Ecommerce</b> Site</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="./">HOME</a></li>
          <li><a href="">ABOUT US</a></li>
          <li><a href="">CONTACT US</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">

            <?php $db = dbConnect(); $stmt = $db->query('SELECT * FROM category '); foreach($stmt as $data): ?>
              <li><a href='categorys.php?idcat=<?= base64_encode($data['id']) ?>'><?= $data['name'] ?></a></li>
            <?php endforeach; ?>

            </ul>
          </li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"><?= isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0 ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
            </ul>
          </li>
          <li><a href="#" id="user"><?= $_SESSION['user']['firstname'] ?></li></a>
          <?php if (isset($_SESSION['user']['firstname'])): ?>
            <li><a href='./signout.php'><i class="fa fa-power-off" style="color:red"></i> SIGNOUT</a></li>
          <?php else : ?>
            <li><a href='./signin.php'>SIGNIN</a></li>
            <li><a href='./signup.php'>SIGNUP</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>