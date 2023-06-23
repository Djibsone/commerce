<?php if ($_SESSION['user']['status'] === 1): ?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= (!empty($_SESSION['user']['photo'])) ? '../assets/photo_user/'.$_SESSION['user']['photo'] : '../assets/photo_user/avatar.jpg' ?>" class="img-circle" alt="User Image" style="width: 200%; height: 50px">
        </div>
        <div class="pull-left info">
            <p>Code Projects</p>
            <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">REPORTS</li>
          <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
          <li class="header">MANAGE</li>
          <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
          <li class="treeview">
              <a href="#">
              <i class="fa fa-barcode"></i>
              <span>Products</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>
                <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
              </ul>
          </li>
        </ul>
    </section>
  <!-- /.sidebar -->
</aside>

<?php else : ?>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= (!empty($_SESSION['user']['photo'])) ? '../assets/photo_user/'.$_SESSION['user']['photo'] : '../assets/photo_user/avatar.jpg' ?>" class="img-circle" alt="User Image" style="width: 200%; height: 50px">
        </div>
        <div class="pull-left info">
            <p>Code Projects</p>
            <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">REPORTS</li>
          <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboarddddddddddddddddd</span></a></li>
          <!-- <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
          <li class="header">MANAGE</li>
          <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li> -->
          <li class="treeview">
              <a href="#">
              <i class="fa fa-barcode"></i>
              <span>Products</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="accueil.php"><i class="fa fa-circle-o"></i> Product List</a></li>
              </ul>
          </li>
        </ul>
    </section>
  <!-- /.sidebar -->
</aside>
<?php endif; ?>

