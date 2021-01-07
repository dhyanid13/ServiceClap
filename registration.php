
 <?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>
   <?php
    
  if(isset($_POST['create_user'])) {
       
           
            $user_firstname    = $_POST['user_firstname'];
            $user_lastname     = $_POST['user_lastname'];
            $user_role         = $_POST['user_role'];
            $username          = $_POST['username'];
            $user_email        = $_POST['user_email'];
            $user_password     = $_POST['user_password'];
       
            $user_image        = $_FILES['image']['name'];
            $user_image_temp   = $_FILES['image']['tmp_name'];



            
       
            
              move_uploaded_file($user_image_temp, "../images/$user_image" );
              
            $query = "INSERT INTO users(user_firstname,  user_lastname, user_role,username,user_email,user_password,user_image) ";
                 
            $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}','{$user_image}') "; 
                 
            $create_user_query = mysqli_query($connection, $query);  
              
              
            
       
       
                   echo "User Created";
               header("Location:./index.php"); 
       
      
   
   }


    
?>


<?php  include "include/navigation.php"; ?>
  
   
    <style>
        
     p{
            text-align: center;
            font-size: 30px;
            font-family: fantasy;
        }

       
    .form-style-9{
	max-width: 1000px;
	background: #FAFAFA;
	padding: 30px;
	margin: 30px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
    background-image: radial-gradient(white,skyblue);
        
       
}
</style>

    
    
   <br>
   <br>
   <br>
    <div class="alert alert-warning" role="alert">
  
	<p>If you only wish to avail our services you can enjoy without registering .
  But for service providers registering is must!!</p>
</div>
   
    
   
    <form action="" method="post" enctype="multipart/form-data" class="form-style-9">    
     
     
     
      <div class="form-group">
         <label for="title">Firstname</label>
          <input type="text" class="form-control" name="user_firstname" required>
      </div>
      
      
      

       <div class="form-group">
         <label for="post_status">Lastname</label>
          <input type="text" class="form-control" name="user_lastname" required>
      </div>
     
     
         <div class="form-group">
       
       <select name="user_role" id="">
        <option value="subscriber">Select Options</option>
          <option value="admin">Admin</option>
          <option value="subscriber">Subscriber</option>
           
        
       </select>
       
       
       
       
      </div>
      
      <div class="form-group">
         <label for="user_image">User Image</label>
          <input type="file"  name="image" >
      </div>


      <div class="form-group">
         <label for="post_tags">Username</label>
          <input type="text" class="form-control" name="username" required>
      </div>
      
      <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" class="form-control" name="user_email" required>
      </div>
      
      <div class="form-group">
         <label for="post_content">Password</label>
          <input type="password" class="form-control" name="user_password" required>
      </div>
      
      
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" onclick="sweet() "value="Add User">
      </div>


</form>


        <hr>
<script>
                        function sweet(){
                             swal({
                              title: "Registered Successfully!",
                              text: "Thanks for choosing service clap!",
                              icon: "success",
                              button: "Aww yiss!",
                            });
                            
                           
                            
                        }
                       
                    </script>
   
    
     
      
       
        
         
          
           
            
             
              
               
                
                 
                  
                   
                    
                     
                      
                       
                        
                         
                          
                           
                             
     


    <?php  include "include/footer.php"; ?>