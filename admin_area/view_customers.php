<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<div class="row"><!-- row Begin -->

	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<ol class="breadcrumb"><!-- breadcrumb begin -->
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Customers
			</li>
		</ol><!-- breadcrumb finish -->

	</div><!-- col-lg-12 finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Customers
				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<div class="table-responsive"><!-- table-responsive begin -->
					
					<table class="table table-striped table-bordered table-hover"><!-- table begin -->
						
						<thead>
							<tr>
								<th> No: </th>
								<th> Name: </th>
								<th> Image: </th>
								<th> E-mail: </th>
								<th> Country: </th>
								<th> City: </th>
								<th> Address: </th>
								<th> Contact: </th>
								<th> Delete: </th>
							</tr>
						</thead>

						<tbody>
							<?php
								$i=0;
								$get_c = "select * from customers";
								$run_c = mysqli_query($con,$get_c);
								while ($row_c = mysqli_fetch_array($run_c)) {
									$c_id = $row_c['customer_id'];
									$c_name = $row_c['customer_name'];
									$c_image = $row_c['customer_image'];
									$c_email = $row_c['customer_email'];
									$c_country = $row_c['customer_country'];
									$c_city = $row_c['customer_city'];
									$c_address = $row_c['customer_address'];
									$c_contact = $row_c['customer_contact'];
									$i++;
							 ?>
							 <tr>
							 	<td><?php echo $c_id; ?></td>
							 	<td><?php echo $c_name; ?></td>
							 	<td><img src="../customer/customer_images/<?php echo $c_image; ?>" width="60" height="60"></td>
							 	<td><?php echo $c_email; ?></td>
							 	<td><?php echo $c_country; ?></td>
							 	<td><?php echo $c_city; ?></td>
							 	<td><?php echo $c_address; ?></td>
							 	<td><?php echo $c_contact; ?></td>
							 	<td>
							 		<a href="index.php?delete_customer=<?php echo $c_id; ?>">
							 			<i class="fa fa-trash-o"></i> Delete
							 		</a>
							 	</td>
							 </tr>
							 <?php
								}
							 ?>
						</tbody>

					</table><!-- table finish -->

				</div><!-- table-responsive finish -->
			
			</div><!-- panel-body finish -->


		</div><!-- panel panel-default finish -->

	</div><!-- col-lg-12 finish -->

</div><!-- row Finish -->

<?php } ?>