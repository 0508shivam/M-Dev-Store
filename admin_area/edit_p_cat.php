<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<?php

	if (isset($_GET['edit_p_cat'])) {
		$edit_p_cat_id = $_GET['edit_p_cat'];
		$edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
		$run_edit = mysqli_query($con,$edit_p_cat_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$p_cat_id = $row_edit['p_cat_id'];
		$p_cat_title = $row_edit['p_cat_title'];
		$p_cat_desc = $row_edit['p_cat_desc'];
	}

?>

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
	
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
			</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					
					<i class="fa fa-pencil fa-fw"></i> Edit Product Category

				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<form method="post" class="form-horizontal">
					
					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Product Category Title </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Product Category Description </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<textarea name="p_cat_desc" type="text" cols="30" rows="10" class="form-control"><?php echo $p_cat_desc; ?></textarea>

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="submit" name="update" class="form-control btn btn-primary" value="Update">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

				</form>

			</div><!-- panel-body finish -->

		</div><!-- panel panel-default finish -->

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<?php 

	if (isset($_POST['update'])) {
		$p_cat_title = $_POST['p_cat_title'];
		$p_cat_desc = $_POST['p_cat_desc'];
		$update_p_cat = "update product_categories set p_cat_title='$p_cat_title ',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";
		$run_p_cat = mysqli_query($con,$update_p_cat);
		if ($run_p_cat) {
			echo "<script>alert('Your Product Category has been Updated')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self')</script>";
		}
	}

?>

<?php } ?>