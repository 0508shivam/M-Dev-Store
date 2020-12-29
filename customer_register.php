<?php
$active='Home';
include("includes/header.php");
?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->

           <div class="col-md-9"><!-- col-md-9 Begin -->
             
             <div class="box"><!-- box Begin -->
               
               <div class="box-header"><!-- box-header Begin -->
                 
                 <center>
                   <h2>Register a new account</h2>
                 </center>

                  <form action="customer_register.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      
                      <label>Your Name</label>
                      <input type="text" class="form-control" name="c_name" placeholder="Enter Your Name" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Your E-mail</label>
                      <input type="text" class="form-control" name="c_email" placeholder="Enter Your E-mail" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Your Password</label>
                      <input type="password" class="form-control" name="c_pass" placeholder="Enter Password" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Your Country</label>
                      <input type="text" class="form-control" name="c_country" placeholder="Enter Your Country" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Your City</label>
                      <input type="text" class="form-control" name="c_city" placeholder="Enter Your City" required>

                    </div> 

                    <div class="form-group">
                      
                      <label>Your Contact</label>
                      <input type="text" class="form-control" name="c_contact" placeholder="Enter Your Contact Number" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Your Address</label>
                      <input type="text" class="form-control" name="c_address" placeholder="Enter Your Address" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Your Profile Picture</label>
                      <input type="file" class="form-control form-height-custom" name="c_image" required>

                    </div>



                    <div class="text-center">
                      
                      <button class="btn btn-primary" type="submit" name="register">
                        <i class="fa fa-user-md"></i> Register
                      </button>

                    </div>
                  </form>

               </div><!-- box-header Finish -->

             </div><!-- box Finish -->

           </div><!-- col-md-9 Finish -->

       </div><!-- container Finish -->

   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>

<?php

if (isset($_POST['register'])) {
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_ip = getRealIpUser();
  move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
  $insert_customer = "insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
  $run_customer = mysqli_query($con,$insert_customer);
  $sel_cart = "select * from cart where ip_add='$c_ip'";
  $run_cart = mysqli_query($con,$sel_cart);
  $check_cart = mysqli_num_rows($run_cart);
  if($check_cart>0){
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have been registered successfully')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }
  else{
   $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('You have been registered successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>"; 
  }
}

?>