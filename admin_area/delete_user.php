<?php

    include("includes/db.php");
    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
    	$session_email = $_SESSION['admin_email'];

?>
<?php
	if (isset($_GET['delete_user'])) {
		$delete_id = $_GET['delete_user'];
		$get_admin = "select * from admins where admin_id='$delete_id'";
		$run_admin = mysqli_query($con,$get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$admin_email = $row_admin['admin_email'];
		if ($session_email != $admin_email) {
		$delete_user = "delete from admins where admin_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete_user);
			if ($run_delete) {
			echo "<script>alert('One of your user has been deleted')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
			}
		}else{
			echo "<script>alert('Session admin cannot be deleted')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
		}
	}
?>
<?php } ?>