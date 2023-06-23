<!-- tête -->
<?php 
include '../controllers/get_count.php';
include 'includes/session.php';
include 'includes/tete_page.php'
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- header home -->
<?php include './includes/home.php' ?>

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
            	<form class="form-horizontal" method="POST" action="../controllers/admin_edit.php" enctype="multipart/form-data">
                <input type="hidden" class="adminid" name="id">
          		  <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Email</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="email" name="email" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" required>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Monthly Sales Report</h3>
          <div class="box-tools pull-right">
            <form class="form-inline">
              <div class="form-group">
                <label>Select Year: </label>
                <select class="form-control input-sm" id="select_year">
                        <option value='2023' selected>2023</option>
                          
                        <option value='2024' >2024</option>
                          
                        <option value='2025' >2025</option>
                          
                        <option value='2026' >2026</option>
                          
                        <option value='2027' >2027</option>
                          
                        <option value='2028' >2028</option>
                          
                        <option value='2029' >2029</option>
                          
                        <option value='2030' >2030</option>
                          
                        <option value='2031' >2031</option>
                          
                        <option value='2032' >2032</option>
                          
                        <option value='2033' >2033</option>
                          
                        <option value='2034' >2034</option>
                          
                        <option value='2035' >2035</option>
                </select>
              </div>
            </form>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <br>
            <div id="legend" class="text-center"></div>
            <canvas id="barChart" style="height:350px"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  </section>
  <!-- right col -->
</div>
  	<!-- pied -->
<?php include './includes/pied_page.php' ?>

</div>
<!-- ./wrapper -->

<!-- liens script -->
<?php include './includes/script.php' ?>

</body>
</html>
