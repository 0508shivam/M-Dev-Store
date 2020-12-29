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
				<i class="fa fa-dashboard"></i> Dashboard / Insert Product Category
			</li>
		</ol>

	</div><!-- col-lg-12 finish -->

</div><!-- row finish -->

<div class="row"><!-- row begin -->
	
	<div class="col-lg-12"><!-- col-lg-12 begin -->
		
		<div class="panel panel-default"><!-- panel panel-default begin -->
			
			<div class="panel-heading"><!-- panel-heading begin -->
				
				<h3 class="panel-title">
					
					<i class="fa fa-money fa-fw"></i> Insert Product Category

				</h3>

			</div><!-- panel-heading finish -->

			<div class="panel-body"><!-- panel-body begin -->
				
				<form method="post" class="form-horizontal">
					
					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Product Category Title </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<input type="text" name="p_cat_title" class="form-control">

						</div><!-- col-md-6 finish -->

					</div><!-- form-group finish -->

					<div class="form-group"><!-- form-group begin -->
						
						<label class="control-label col-md-3"> Product Category Description </label>

						<div class="col-md-6"><!-- col-md-6 begin -->
							
							<textarea name="p_cat_desc" type="text" cols="30" rows="10" class="form-control"></textarea>

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
		$p_cat_title = $_POST['p_cat_title'];
		$p_cat_desc = $_POST['p_cat_desc'];
		$insert_p_cat = "insert into product_categories(p_cat_title,p_cat_desc)values('$p_cat_title','$p_cat_desc')";
		$run_p_cat = mysqli_query($con,$insert_p_cat);
		if ($run_p_cat) {
			echo "<script>alert('Your New Product Category has been Inserted')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self')</script>";
		}
	}

?>

<?php } ?>