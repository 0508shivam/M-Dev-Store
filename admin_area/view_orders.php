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
				<i class="fa fa-dashboard"></i> Dashboard / View Orders
			</li>
		</ol><!-- breadcrumb finish -->

	</div><!-- col-lg-12 finish -->

</div><!-- row Finish -->

<div class="row"><!-- row Begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Orders
				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<div class="table-responsive"><!-- table-responsive begin -->
					
					<table class="table table-striped table-bordered table-hover"><!-- table begin -->
						
						<thead>
							<tr>
								<th> No: </th>
								<th> Customer Email: </th>
								<th> Invoice No: </th>
								<th> Product Name: </th>
								<th> Product Qty: </th>
								<th> Product Size: </th>
								<th> Order Date: </th>
								<th> Total Amount: </th>
								<th> Status: </th>
								<th> Delete: </th>
							</tr>
						</thead>

						<tbody>
							<?php
								$i=0;
								$get_orders = "select * from pending_orders";
								$run_orders = mysqli_query($con,$get_orders);
								while ($row_orders = mysqli_fetch_array($run_orders)) {
									$order_id = $row_orders['order_id'];
									$c_id = $row_orders['customer_id'];
									$invoice_no = $row_orders['invoice_no'];
									$product_id = $row_orders['product_id'];
									$qty = $row_orders['qty'];
									$size = $row_orders['size'];
									$order_status = $row_orders['order_status'];
									$get_products = "select * from products where product_id='$product_id'";
									$run_products = mysqli_query($con,$get_products);
									$row_products = mysqli_fetch_array($run_products);
									$product_title = $row_products['product_title'];
									$get_customer = "select * from customers where customer_id='$c_id'";
									$run_customer = mysqli_query($con,$get_customer);
									$row_customer = mysqli_fetch_array($run_customer);
									$c_email = $row_customer['customer_email'];
									$get_c_orders = "select * from customer_orders where order_id='$order_id'";
									$run_c_orders = mysqli_query($con,$get_c_orders);
									$row_c_order = mysqli_fetch_array($run_c_orders);
									$order_date = $row_c_order['order_date'];
									$order_amount = $row_c_order['due_amount'];
									$i++;
							 ?>
							 <tr>
							 	<td><?php echo $order_id; ?></td>
							 	<td><?php echo $c_email; ?></td>
							 	<td><?php echo $invoice_no; ?></td>
							 	<td><?php echo $product_title; ?></td>
							 	<td><?php echo $qty; ?></td>
							 	<td><?php echo $size; ?></td>
							 	<td><?php echo $order_date; ?></td>
							 	<td><?php echo $order_amount; ?></td>
							 	<td><?php 
							 			if ($order_status=='pending') {
							 				echo $order_status='pending';
							 			}
							 			else{
							 				echo $order_status='Complete';
							 			}
							 	?></td>
							 	<td>
							 		<a href="index.php?delete_order=<?php echo $order_id; ?>">
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