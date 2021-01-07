<?php include "include/header.php" ?>
<!--<body>-->

    <div id="wrapper">
       
        
        
      
        <!-- Navigation -->
        <?php include "include/nav.php" ?>
      
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="text-align:center; font-family:serif; font-weight:bold" class="page-header">
                            WELCOME TO ADMIN
                             <small> <?php 

                            if(isset($_SESSION['username'])) {

                            echo $_SESSION['username'];




                            }





                            ?></small>
                        </h1>
                        <div class="col-xs-6">
                        
                        <?php insert_categories(); ?>
                                 
                         
                        <form action="" method="post">
                         <div class="form-group">
                         
                          <label for="cat-title"> Add Category</label>
                    
                               <input type="text" class="form-control" name="cat_title">
                               
                           </div>
                            <div class="form group">
                               <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                               
                           </div>
                        </form>
                        <?php // UPDATE AND INCLUDE QUERY

                            if(isset($_GET['edit'])) {
    
                            $cat_id = $_GET['edit'];
        
                            include "include/update_categories.php";
       
    
                    }
                
                
                ?>
                        
                     <!--HERE   
                        
                        
                        
                        
                        
                       HERE -->
                        
                        
                    </div><!--ADD CATEGORIES -->
                        
                        
                        <div class="col-xs-6">
    <table class="table table-bordered table-hover">
      

        <thead>
            <tr>
                <th>Id</th>
                <th>Category Title</th>
                 <th>Delete</th>
                 <th>Edit</th>
                 
            </tr>
        </thead>
        <tbody>
   <?php //FIND ALL CATEGORIES

            findAllCategories(); ?>

        </tbody>
    </table>

                        </div>        
                        
                 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       
      
 <?php //DELe TE QUERY 
        deleteCategories();
            
            ?>
            
              <!-- /#page-wrapper -->

   <?php include "include/footer.php" ?>