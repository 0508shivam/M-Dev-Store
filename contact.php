<?php
$active='Contact';
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
                       Contact Us
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
                   <h2>Feel Free to Contact Us</h2>
                   <p class="text-muted">
                     If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7
                     </strong>
                   </p>
                 </center>

                  <form action="contact.php" method="post">
                    <div class="form-group">
                      
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>

                    </div>

                    <div class="form-group">
                      
                      <label>E-mail</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter Your E-mail" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Subject</label>
                      <input type="text" class="form-control" name="subject" placeholder="Subject" required>

                    </div>

                    <div class="form-group">
                      
                      <label>Message</label>
                      <textarea name="message" class="form-control" placeholder="Message.." rows="5"></textarea>

                    </div>

                    <div class="text-center">
                      
                      <button class="btn btn-primary" type="submit" name="submit">
                        <i class="fa fa-user-md"></i> Send Message
                      </button>

                    </div>
                  </form>

                  <?php
                  if(isset($_POST['submit'])){
                    /// Admin receives this message with this ///
                    $sender_name = $_POST['name'];
                    $sender_email = $_POST['email'];
                    $sender_subject = $_POST['subject'];
                    $sender_message = $_POST['message'];
                    $receiver_email = "sparksltd2020@gmail.com";
                    mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);

                    /// Auto reply to sender with this ///

                    $email = $_POST['email'];
                    $subject = "Welcome to My Store";
                    $msg = "Thanks! for sending us message. ASAP we will reply your message";
                    $from = "sparksltd2020@gmail.com";
                    mail($email, $subject, $msg, $from);
                    echo "<h2 align='center' style='color:red;'>Your message has been sent successfully.</h2>";
                  }
                  ?>

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