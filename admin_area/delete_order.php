<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>
<?php
	if (isset($_GET['delete_order'])) {
		$delete_id = $_GET['delete_order'];
		$delete_order = "delete from pending_orders where order_id='$delete_id'";
		$delete_order2 = "delete from customer_orders where order_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete_order);
		$run_delete2 = mysqli_query($con,$delete_order2);
		if ($run_delete && $run_delete2) {
			echo "<script>alert('One of your orders has been deleted')</script>";
			echo "<script>window.open('index.php?view_orders','_self')</script>";
		}
	}
?>
<?php } ?>