<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
	
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / View Product Category
			</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					
					<i class="fa fa-tags fa-fw"></i> View Product Category

				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<div class="table-responsive"><!-- table-responsive begin -->
					
					<table class="table table-hover table-striped table-bordered">
						
						<thead>
							<tr>
								<th> Product Category ID: </th>
								<th> Product Category Title: </th>
								<th> Product Category Desc: </th>
								<th> Edit Product Category: </th>
								<th> Delete Product Category: </th>
							</tr>
						</thead>

						<tbody>
							<?php
								$i=0;
								$get_p_cats = "select * from product_categories";
								$run_p_cats = mysqli_query($con,$get_p_cats);
								while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
									$p_cat_id = $row_p_cats['p_cat_id'];
									$p_cat_title = $row_p_cats['p_cat_title'];
									$p_cat_desc = $row_p_cats['p_cat_desc'];
									$i++;
							?>
							<tr>
								<td><?php echo $p_cat_id; ?></td>
								<td><?php echo $p_cat_title; ?></td>
								<td width="300"><?php echo $p_cat_desc; ?></td>
								<td><a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
									<i class="fa fa-pencil"></i> Edit
								</a></td>
								<td><a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
									<i class="fa fa-trash-o"></i> Delete
								</a></td>
							</tr>
						<?php } ?>
						</tbody>

					</table>

				</div><!-- panel-body finish -->

			</div><!-- panel-body finish -->

		</div><!-- panel panel-default finish -->

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<?php } ?>