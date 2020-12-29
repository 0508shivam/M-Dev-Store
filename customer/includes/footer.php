<div id="footer"><!-- #footer Begin -->
	
	<div class="container"><!-- container Begin -->
		
		<div class="row"><!-- row Begin -->
			
			<div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->

            <h4>Pages</h4>

            <ul>
            	<li><a href="../cart.php">Shopping Cart</a></li>
            	<li><a href="../contact.php">Contact Us</a></li>
            	<li><a href="../shop.php">Shop</a></li>
            	<li>
            		<?php
            		if (!isset($_SESSION['customer_email'])) {
            			echo "<a href='../checkout.php'>Login</a>";
            		}
            		else{
            			echo "<a href='my_account.php?my_orders'>My Account</a>";
            		}
            		?>
            	</li>
            </ul>

            <hr>

            <h4>User Section</h4>

            <ul>
            	<li>
            		<?php 
            		if (!isset($_SESSION['customer_email'])) {
            			echo "<a href='../checkout.php'>Login</a>";
            		}
            		else{
            			echo "<a href='my_account.php?edit_account'>Edit Account</a>";
            		}
            		?>
            	</li>
            	<li><a href="../customer_register.php">Register</a></li>
            </ul>

            <hr class="hidden-md hidden-lg hidden-sm">

			</div><!-- col-sm-6 col-md-3 Finish -->

			<div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
				
				<h4>Top Products Categories</h4>

				<ul>
					<?php

						$get_p_cats = "select * from product_categories";
						$run_p_cats=mysqli_query($con,$get_p_cats);
						while($row_p_cats=mysqli_fetch_array($run_p_cats)){

							$p_cat_id=$row_p_cats['p_cat_id'];
							$p_cat_title=$row_p_cats['p_cat_title'];

							echo "
								<li>
								<a href='../shop.php?p_cat=$p_cat_id'>
								$p_cat_title
								</a>
								</li>
							";
						}

					?>
				</ul>

				<hr class="hidden-md hidden-lg">

			</div><!-- col-sm-6 col-md-3 Finish -->

			<div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
				
               <h4>Find Us:</h4>

               <p>
               	<strong>M-Dev Media inc.</strong>
               	<br/>Kidwai Nagar
               	<br/>Kanpur
               	<br/>7309459695
               	<br/>sparksltd2020@gmail.com
               	<br/><strong>Shivam</strong>
               </p>

               <a href="../contact.php">Check Our Contact Page</a>

               <hr class="hidden-md hidden-lg">

			</div><!-- col-sm-6 col-md-3 Finish -->

			<div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
				
				<h4>Get The News</h4>

				<p class="text-muted">
					Don't Miss Our Latest Update Products.
				</p>

				<form action="" method="post">

					<div class="input-group"><!-- input-group Begin -->
						
						<input type="text" name="email" class="form-control">

						<span class="input-group-btn">
							
							<input type="submit" value="Subscribe" class="btn btn-default">

						</span>

					</div><!-- input-group Finish -->

				</form>

				<hr>

				<h4>Keep In Touch</h4>

				<p class="social">

					<a href="../#" class="fa fa-facebook"></a>
					<a href="../#" class="fa fa-twitter"></a>
					<a href="../#" class="fa fa-instagram"></a>
					<a href="../#" class="fa fa-google-plus"></a>
					<a href="../#" class="fa fa-envelope"></a>

			</div><!-- col-sm-6 col-md-3 Finish -->

		</div><!-- row Finish -->

	</div><!-- container Finish -->

</div><!-- #footer Finish -->

<div id="copyright"><!-- copyright Begin -->
	
	<div class="container"><!-- container Begin -->
		
		<div class="col-md-6">
			<p class="pull-left">&copy; 2020 M-Dev Store. All Rights Reserved.</p>
		</div>

		<div class="col-md-6">
			<p class="pull-right">Theme By: <a href="#">Sparks Ltd.</a></p>
		</div>

	</div><!-- container Begin -->

</div><!-- copyright Finish -->
