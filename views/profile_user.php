<?php 
include '../controllers/get_user.php';
include 'includes/session.php' 
?>

<?php include 'includes/tete_page.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/header.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">

	        		 <!-- mesg error and success -->
      				<?php include 'includes/msg_error_success.php' ?>

	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					<img src="<?= (!empty($user['photo'])) ? '../assets/photo_user/'.$user['photo'] : '../assets/photo_user/avatar.jpg' ?>" width="100%">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-3">
	        							<h4>Name:</h4>
	        							<h4>Email:</h4>
	        							<h4>Contact:</h4>
	        							<h4>Address:</h4>
	        							<h4>Member Since:</h4>
	        						</div>
	        						<div class="col-sm-9">
	        							<h4><?php echo $user['firstname'].' '.$user['lastname']; ?>
	        								<span class="pull-right">
												<a href="#" class="btn btn-success btn-flat btn-sm btn-edit" data-id="<?= $user['id'] ?>"><i class="fa fa-edit"></i> Edit</a>
	        								</span>
	        							</h4>
	        							<h4><?= $user['email'] ?></h4>
	        							<h4><?= (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a' ?></h4>
	        							<h4><?= (!empty($user['address'])) ? $user['address'] : 'N/a' ?></h4>
	        							<h4><?= date('M d, Y', strtotime($user['created_on'])) ?></h4>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Transaction History</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered" id="example1">
	        					<thead>
	        						<th class="hidden"></th>
	        						<th>Date</th>
	        						<th>Transaction#</th>
	        						<th>Amount</th>
	        						<th>Full Details</th>
	        					</thead>
	        					<tbody>
	        					<?php

	        						try{
	        							$stmt = getSaleUser($_SESSION['user']['id']);

	        							foreach($stmt as $row){
	        								$stmt2 = getDetails($row['id']);
	        								$total = 0;
	        								foreach($stmt2 as $row2){
	        									$subtotal = $row2['price']*$row2['quantity'];
	        									$total += $subtotal;
	        								}
	        								echo "
	        									<tr>
	        										<td class='hidden'></td>
	        										<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
	        										<td>".$row['pay_id']."</td>
	        										<td>&#36; ".number_format($total, 2)."</td>
	        										<td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
	        									</tr>
	        								";
	        							}
	        						}
        							catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}

	        					?>
	        					</tbody>
	        				</table>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php include './includes/pied_page.php'; ?> 
	<?php include './includes/profile_modal.php'; ?>	
</div>

<?php include './includes/script.php'; ?>
</body>
</html>