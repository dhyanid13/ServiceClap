<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>
 
    
    <?php  include "include/navigation.php"; ?>
    
    <?php
   if(isset($_POST['book_service'])){
       
       
                $custname        = $_POST['custname'];
                $email       = $_POST['email'];
                $phone  =      $_POST['phone'];
                $address       = $_POST['address'];
                $zip         = $_POST['zip'];
                $date      = $_POST['date'];
                $time      = $_POST['time'];
                $service      = $_POST['service'];
       
       
        
//               
//            if(!preg_match($emailval, $email)) {
//                $msg="Please enter a valid email";
//            }
                
            if((!preg_match('/^[0-9]{10}$/', $phone)) && (!preg_match('/^[0-9]{6}$/',$zip))){
                   $msg="Please enter a valid number and check your phone number";
            }
            
            else {
                // Write your insert coding
                $msg_sucess="Record inserted successfully";
                $msg="";
       
               




                   $query = "INSERT INTO booking(custname,email,phone,address,zip,date,time,service) ";

                   $query .= "VALUES('$custname','$email','$phone','$address','$zip','$date','$time','$service') "; 


                   $create_post_query = mysqli_query($connection, $query);

                    $sql = "SELECT book_id FROM booking WHERE email=$email";
                    $to = $email;
                    $subject = "Booking Confirmation Mail";

                    $message = "Dear $custname your booking on $date and at $time has been confirmed. Thank you for choosing service clap";

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                    $headers .= 'From: <serviceclap@example.com>' . "\r\n";

                    mail($to,$subject,$message,$headers);
                
               
            }
   }
?>
       
       
       
       

       

  
                        <style>
                            body{
                                background-image: url(images/bg.jpg);
                                background-repeat: no-repeat;
                                  background-attachment: fixed;
                                  background-size: 100% 100%;
                            }
                            
                            .error {
                                margin-top: 6px;
                                margin-bottom: 0;
                                color: #fff;
                                background-color: #D65C4F;
                                display: table;
                                padding: 5px 8px;
                                font-size: 11px;
                                font-weight: 600;
                                line-height: 14px;
                                }
                            .green{
                                margin-top: 6px;
                                margin-bottom: 0;
                                color: #fff;
                                background-color: green;
                                display: table;
                                padding: 5px 8px;
                                font-size: 11px;
                                font-weight: 600;
                                line-height: 14px;
                            }




       
                            .form-style-9{
                                max-width: 1000px;
                                background: #FAFAFA;
                                padding: 30px;
                                margin: 30px auto;
                                box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
                                border-radius: 10px;
                                border: 6px solid #305A72;
                                background-image: radial-gradient(white,grey);

       
                            }
</style>
                            
                            <br>
                            <br>
                            <br>

							<form action="" method="post" enctype="multipart/form-data" class="form-style-9">    
								<div class="form-group">
									<span class="form-label">Your Name</span>
									<input class="form-control" name="custname" type="text" placeholder="Enter your full name" required>
								</div>
								<div class="form-group">
									<span class="form-label">Your Email</span>
									<input class="form-control" name="email" type="email" placeholder="Enter your valid email" required>
								</div>
								<div class="form-group">
									<span class="form-label">Your Address</span>
									<textarea name="address" name="address" id="" cols="40" rows="7"  placeholder="Enter your addresss" required></textarea>
									
								</div>
								<div class="form-group">
									<span class="form-label">Contact No</span>
									<input class="textarea" name="phone" type="number" placeholder="Enter your contact number" required>
								</div>
								
								<div class="form-group">
									<span class="form-label">Zip code</span>
									<input class="textarea" name="zip" type="number" placeholder="Enter your zip code" required >
								</div>
								<div class="row">
									<div class="col-sm-7">
										<div class="form-group">
											<span class="form-label">Date of Service</span>
											<input class="form-control" name="date" type="date" required>
										</div>
									</div>
									
									<label for="appt">Select a time:</label>
  <input type="time" name="time" id="appt"  required>
                                    </div>
								
				                <br>
								<div class="row">
									<div class="col-sm-6">
									
										<div class="form-group">
											<span class="form-label">Service</span>
											<select name="service" class="form-control">
											<?php

       $query="SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];


        if($post_id == $post_category_id) {

      
        echo "<option selected value='{$post_id}'>{$post_title}</option>";


        } else {

          echo "<option value='{$post_id}'>{$post_title}</option>";


        }
      
   
        }

?>
			
                                            </select>										
												
								
											<span class="select-arrow"></span>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Service Provider</span>
											<select class="form-control">
												     
      <?php

        $query = "SELECT * FROM categories ";
        $select_categories = mysqli_query($connection,$query);
        
        //confirmQuery($select_categories);


        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];


        if($cat_id == $post_category_id) {

      
        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";


        } else {

          echo "<option value='{$cat_id}'>{$cat_title}</option>";


        }
      
   
        }

?>
											</select>
								
											<span class="select-arrow"></span>
										</div>
									</div>
									
								</div>
								
								<div class="form-group">
       <input class="btn btn-primary" type="submit" name="book_service" onclick="sweet() "value="Confirm Booking">
    </div>
                                <div class="<?=(@$msg_sucess=="") ? 'error' : 'green' ; ?>">
                                 <?php echo @$msg; ?><?php echo @$msg_sucess; ?></div>
								
    
							</form>
							
							
							


                    <script>
                        function sweet(){
                             swal({
                              title: "Booking Confirmed!",
                              text: "Thanks for choosing service clap!",
                              icon: "success",
                              button: "Aww yiss!",
                            });
                            
                        }
                       
                    </script>


<!--
                    
                    
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
    
    
-->
    
 
    <!-- Page Content -->
    



