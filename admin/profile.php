<?php include "include/header.php" ?>
<?php

   if(isset($_SESSION['username'])) {
    
    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    
    $select_user_profile_query = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_array($select_user_profile_query)) {
    
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password= $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role= $row['user_role'];
    
    
    
    }
    

}
  
    ?>
    
    
<?php 



if(isset($_POST['edit_user'])) {
       
            
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_role = $_POST['user_role'];
    
            $post_image = $_FILES['image']['name'];
           $post_image_temp = $_FILES['image']['tmp_name'];
    
    
            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
           $post_date = date('d-m-y');

       
      move_uploaded_file($post_image_temp, "./images/$post_image" );
    
        $query = "SELECT randSalt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);
        if(!$select_randsalt_query) {
        die("Query Failed" . mysqli_error($connection));

        }
       
        $row = mysqli_fetch_array($select_randsalt_query); 
        $salt = $row['randSalt'];
        $hashed_password = crypt($user_password, $salt);
    
 
          $query = "UPDATE users SET ";
          $query .="user_firstname  = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_role   =  '{$user_role}', ";
          $query .="username = '{$username}', ";
          $query .="user_email = '{$user_email}', ";
          $query .="user_password   = '{$hashed_password}' ";
          $query .= "WHERE username = '{$username}' ";
       
       
            $edit_user_query = mysqli_query($connection,$query);
       
            
   
   
   }
    

    




?> 
    
    
    

    <div id="wrapper">
        
  

        <!-- Navigation -->
 
        <?php include "include/nav.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

  <h1 style="text-align:center; font-family:serif; font-weight:bold" class="page-header">
                Welcome to your profile
                
            </h1>
             
    <style>
        img {
            margin-left: 370px;
            border-radius: 50%;
            height: 150px;
            border: 6px solid #305A72;
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

            
             <form action="" method="post" enctype="multipart/form-data" class="form-style-9">    
     
     <div class="dp">
         <img width="150" src="../images/<?php echo $user_image; ?>" alt="">
     </div>
     
      <div class="form-group">
         <label for="title">Firstname</label>
          <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname" required>
      </div>
      
      
      

       <div class="form-group">
         <label for="post_status">Lastname</label>
          <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname" required>
      </div>
     
     
         <div class="form-group">
       
       <select name="user_role" id="">
       
    <option value="subscriber"><?php echo $user_role; ?></option>
       <?php 

    if($user_role == 'admin') {
    
     echo "<option value='subscriber'>subscriber</option>";
    
    } else {
    
    
    echo "<option value='admin'>admin</option>";
    
    }

        
    
           ?>
       
       
          
         
           
        
       </select>
       
       
       
       
      </div>
      

      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>


      <div class="form-group">
         <label for="post_tags">Username</label>
          <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" required>
      </div>
      
      <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email" required>
      </div>
      
      <div class="form-group">
         <label for="post_content">Password</label>
          <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password" required>
      </div>
      
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
      </div>


</form>
    
            
            
            
      
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

     
        <!-- /#page-wrapper -->
        
    <?php include "include/footer.php" ?>