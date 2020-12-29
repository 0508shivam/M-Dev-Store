<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<?php

	if (isset($_GET['delete_p_cat'])) {
		$delete_p_cat_id = $_GET['delete_p_cat'];
		$delete_p_cat = "delete from product_categories where p_cat_id='$delete_p_cat_id'";
		$run_p_cat = mysqli_query($con,$delete_p_cat);
		if ($run_p_cat) {
			echo "<script>alert('One of Your Product Category has been Deleted')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self')</script>";
		}
	}

?>

<?php } ?>