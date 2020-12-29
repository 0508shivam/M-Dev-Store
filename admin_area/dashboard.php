<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row"><!-- row no 1 begin -->
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		<h1 class="page-header">
			Dashboard
		</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol>
	</div><!-- col-lg-12 finish -->
</div><!-- row no 1 finish -->

<div class="row"><!-- row no 2 begin -->
	
	<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
		
		<div class="panel panel-primary"><!-- panel panel-primary begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-tasks fa-5x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
						<div class="huge"><?php echo $count_products; ?></div>
						<div>Products</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->

			<a href="index.php?view_products">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>

		</div><!-- panel panel-primary finish -->

	</div><!-- col-lg-3 col-md-6 finish -->

	<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
		
		<div class="panel panel-green"><!-- panel panel-primary begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-users fa-5x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
						<div class="huge"><?php echo $count_customers; ?></div>
						<div>Customers</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->

			<a href="index.php?view_customers">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>

		</div><!-- panel panel-primary finish -->

	</div><!-- col-lg-3 col-md-6 finish -->

	<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
		
		<div class="panel panel-orange"><!-- panel panel-primary begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-tags fa-5x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
						<div class="huge"><?php echo $count_p_categories; ?></div>
						<div>Product Categories</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->

			<a href="index.php?view_p_cats">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>

		</div><!-- panel panel-primary finish -->

	</div><!-- col-lg-3 col-md-6 finish -->

	<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
		
		<div class="panel panel-red"><!-- panel panel-primary begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				<div class="row"><!-- row begin -->
					<div class="col-xs-3"><!-- col-xs-3 begin -->
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div><!-- col-xs-3 finish -->
					<div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
						<div class="huge"><?php echo $count_pending_orders; ?></div>
						<div>Orders</div>
					</div><!-- col-xs-9 finish -->
				</div><!-- row finish -->
			</div><!-- panel-heading finish -->

			<a href="index.php?view_orders">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>

		</div><!-- panel panel-primary finish -->

	</div><!-- col-lg-3 col-md-6 finish -->

</div><!-- row no 2 finish -->

<div class="row"><!-- row no 3 begin -->
	
	<div class="col-lg-8"><!-- col-lg-8 begin -->
		
		<div class="panel panel-primary"><!-- panel panel-primary begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> New Orders
				</h3>
			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<div class="table-responsive"><!-- table-responsive begin -->
					
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Order No:</th>
								<th>Customer Email:</th>
								<th>Invoice No:</th>
								<th>Product ID:</th>
								<th>Product Qty:</th>
								<th>Product Size:</th>
								<th>Status:</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
								$run_order = mysqli_query($con,$get_order);
								while ($row_order = mysqli_fetch_array($run_order)) {
									$order_id = $row_order['order_id'];
									$c_id = $row_order['customer_id'];
									$invoice_no = $row_order['invoice_no'];
									$product_id = $row_order['product_id'];
									$qty = $row_order['qty'];
									$size = $row_order['size'];
									$order_status = $row_order['order_status'];
									$i++;
							 ?>
							<tr>
								<td><?php echo $order_id; ?></td>
								<td>
									<?php
										$get_customer = "select * from customers where customer_id='$c_id'";
										$run_customer = mysqli_query($con,$get_customer);
										$row_customer = mysqli_fetch_array($run_customer);
										$customer_email = $row_customer['customer_email'];
										echo $customer_email;
									?>
								</td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $product_id; ?></td>
								<td><?php echo $qty; ?></td>
								<td><?php echo $size; ?></td>
								<td>
									<?php 
									if ($order_status == 'pending') {
										echo $order_status='Pending';
									}
									else{
										echo $order_status='Complete';
									}
									?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>

				</div><!-- table-responsive finish -->

				<div class="text-right"><!-- text-right begin -->
					<a href="index.php?view_orders">
						View All Orders <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div><!-- text-right finish -->

			</div><!-- panel-body finish -->

		</div><!-- panel panel-primary finish -->

	</div><!-- col-lg-8 finish -->

	<div class="col-md-4"><!-- col-md-4 begin -->
		
		<div class="panel"><!-- panel begin -->
			
			<div class="panel-body"><!-- panel-body begin -->
				
				<div class="mb-md thumb-info"><!-- mb-md thumb-info begin -->
					
					<img src="admin_images/<?php echo $admin_image; ?>" alt="admin-thumb-info" class="rounded img-responsive">

					<div class="thumb-info-title"><!-- thumb-info-title begin -->
						
						<span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
						<span class="thumb-info-type"> <?php echo $admin_job; ?> </span>

					</div><!-- thumb-info-title finish -->

				</div><!-- mb-md thumb-info finish -->

				<div class="mb-md"><!-- mb-md begin -->
					
					<div class="widget-context-expanded"><!-- widget-context-expanded begin -->
						
						<i class="fa fa-user"></i>
						<span>Email:</span> <?php echo $admin_email; ?>
						<br/>
						<i class="fa fa-flag"></i>
						<span>Country:</span> <?php echo $admin_country; ?> <br/>
						<i class="fa fa-envelope"></i>
						<span>Contact:</span> <?php echo $admin_contact; ?>
						<br/>

					</div><!-- widget-context-expanded finish -->

				</div><!-- mb-md finish -->

				<hr class="dotted short" style="margin: 10px 0 10px 0;">

				<h5 class="text-muted">About Us</h5>

				<p> <?php echo $admin_about; ?> </p>

			</div><!-- panel-body finish -->

		</div><!-- panel finish -->

	</div><!-- col-md-4 finish -->

</div><!-- row no 3 finish -->
<?php } ?>