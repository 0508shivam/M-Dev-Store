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
				<i class="fa fa-dashboard"></i> Dashboard / Insert Category
			</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					
					<i class="fa fa-money fa-fw"></i> Insert Category

				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<form method="post" class="form-horizontal">
					
					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Category Title </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="text" name="cat_title" class="form-control">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Category Description </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<textarea name="cat_desc" type="text" cols="30" rows="10" class="form-control"></textarea>

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="submit" name="submit" class="form-control btn btn-primary" value="Submit">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

				</form>

			</div><!-- panel-body finish -->

		</div><!-- panel panel-default finish -->

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<?php 

	if (isset($_POST['submit'])) {
		$cat_title = $_POST['cat_title'];
		$cat_desc = $_POST['cat_desc'];
		$insert_cat = "insert into categories(cat_title,cat_desc)values('$cat_title','$cat_desc')";
		$run_cat = mysqli_query($con,$insert_cat);
		if ($run_cat) {
			echo "<script>alert('Your New Category has been Inserted')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}

?>

<?php } ?>