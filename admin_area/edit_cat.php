<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<?php

	if (isset($_GET['edit_cat'])) {
		$edit_cat_id = $_GET['edit_cat'];
		$edit_cat_query = "select * from categories where cat_id='$edit_cat_id'";
		$run_edit = mysqli_query($con,$edit_cat_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$cat_id = $row_edit['cat_id'];
		$cat_title = $row_edit['cat_title'];
		$cat_desc = $row_edit['cat_desc'];
	}

?>

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
	
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Category
			</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					
					<i class="fa fa-pencil fa-fw"></i> Edit Category

				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<form method="post" class="form-horizontal">
					
					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Category Title </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Category Description </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<textarea name="cat_desc" type="text" cols="30" rows="10" class="form-control"><?php echo $cat_desc; ?></textarea>

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
		$cat_title = $_POST['cat_title'];
		$cat_desc = $_POST['cat_desc'];
		$update_cat = "update categories set cat_title='$cat_title ',cat_desc='$cat_desc' where cat_id='$cat_id'";
		$run_cat = mysqli_query($con,$update_cat);
		if ($run_cat) {
			echo "<script>alert('Your Category has been Updated')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}

?>

<?php } ?>