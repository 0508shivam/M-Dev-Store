<div class="box"><!-- box begin -->
	<div class="box-header"><!-- box-header begin -->
		<center>
			<h1>Login</h1>
			<p class="lead">Already have account..?</p>
			<p class="text-muted">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.
		</p>
        </center>
		<form action="checkout.php" method="post">
			<div class="form-group"><!-- form-group begin -->
				<label>E-mail:</label>
				<input name="c_email" type="text" class="form-control" required>
			</div><!-- form-group finish -->
			<div class="form-group"><!-- form-group begin -->
				<label>Password:</label>
				<input name="c_pass" type="password" class="form-control" required>
			</div><!-- form-group finish -->
			<div class="text-center"><!-- text-center begin -->
				<button class="btn btn-primary" name="login" value="login">
					<i class="fa fa-sign-in"></i> Login
				</button>
			</div><!-- text-center finish -->
		</form>
		<center>
		<a href="customer_register.php">
			<h3>Dont have account..?Register here</h3>
		</a>
	    </center>
	</div><!-- box-header finish -->
</div><!-- box finish -->
<?php
if (isset($_POST['login'])) {
	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_pass'];
	$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer = mysqli_query($con,$select_customer);
	$get_ip = getRealIpUser();
	$check_customer = mysqli_num_rows($run_customer);
	$select_cart = "select * from cart where ip_add='$get_ip'";
	$run_cart = mysqli_query($con,$select_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if ($check_customer==0) {
		echo "<script>alert('Your email or password is wrong')</script>";
		exit();
	}
	if ($check_customer==1 AND $check_cart==0) {
		$_SESSION['customer_email']=$customer_email;
		echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
	}
	else{
		$_SESSION['customer_email']=$customer_email;
		echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";	
	}
}
?>