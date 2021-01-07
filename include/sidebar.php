 
<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                 

                <!-- Blog Search Well -->
                <div  class="well">
                    <h4>What are you looking for?</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!--search form-->
                    <!-- /.input-group -->
                </div>
                
                
                
  <!--Login -->
    <div  class="well">
         
         

             <h4>Login</h4>

                <form action="include/login.php" method="post">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>

                  <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn">
                       <button class="btn btn-primary" name="login" type="submit">Submit
                       </button>
                    </span>
                   </div>

                    
                </form><!--search form-->
                <!-- /.input-group -->



        


       
    </div>
                
                
                
                

                <!-- Blog Categories Well -->
                
                <!-- Side Widget Well -->
                 <?php include "widget.php"; ?>

            </div>
            