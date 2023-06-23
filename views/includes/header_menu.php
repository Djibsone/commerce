<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b>P</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Ecommerce</b> Site</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= (!empty($_SESSION['user']['photo'])) ? '../assets/photo_user/'.$_SESSION['user']['photo'] : '../assets/photo_user/avatar.jpg' ?>" class="img-circle" alt="User Image" style="width: 60%; height: 50px">
            <span class="hidden-xs" id="user"><?= $_SESSION['user']['firstname'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= (!empty($_SESSION['user']['photo'])) ? '../assets/photo_user/'.$_SESSION['user']['photo'] : '../assets/photo_user/avatar.jpg' ?>" class="img-circle" alt="User Image"> 
              <p>
                Code Projects  <small>Member since May. 2018</small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" data-id="<?= $_SESSION['user']['id'] ?>" class="btn btn-default btn-flat admin"><i class="fa fa-edit"></i> Update</a>
              </div>
              <div class="pull-right">
                <a href="./signout.php" class="btn btn-default btn-flat"><i class="fa fa-power-off" style="color:red"></i> Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>