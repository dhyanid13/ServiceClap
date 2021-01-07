<?php include "include/header.php" ?>

    <div id="wrapper">
        
  

        <!-- Navigation -->
 
        <?php include "include/nav.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

  <h1 style="text-align:center; font-family:serif; font-weight:bold" class="page-header">
                Welcome to admin
                 <small> <?php 

                            if(isset($_SESSION['username'])) {

                            echo $_SESSION['username'];




                            }





                            ?></small>
            </h1>
            
            
<?php

if(isset($_GET['source'])){

$source = $_GET['source'];

} else {

$source = '';

}

switch($source) {
    
    case 'add_post';
    
     include "include/add_post.php";
    
    break; 
    
    
    case 'edit_post';
    
    include "include/edit_post.php";
    break;
    
    case '200';
    echo "NICE 200";
    break;
    
    default:
    
    include "include/view_all_comments.php";
    
    break;
    
    
    
    
}








?>

 
            
    
            

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

     
        <!-- /#page-wrapper -->
        
    <?php include "include/footer.php" ?>
