<?php 
include "include/header.php"
?>
<?php 
include "include/db.php"
?>

    <!-- Navigation -->
<?php 
include "include/navigation.php"
?>
 <br>
        <br>
        <br>
      <br>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
    
                if(isset($_GET['p_id'])){
                    
                  $the_post_id = $_GET['p_id'];  
                    
                
                    
                
    
                $query="SELECT * FROM posts WHERE post_id=$the_post_id";
                $select_all_posts_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                   
                    $post_title=  $row['post_title'];
                    $post_author=  $row['post_author'];
                    $post_date=  $row['post_date'];
                    $post_image=  $row['post_image'];
                    $post_content=  $row['post_content'];
                   ?>
                   
                    <h1 class="page-header">
                    We serve you deserve
                    <small>Keep Claping</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
                
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
              
                <p><?php echo $post_content?></p>
                <hr>
                
                <?php }

?>

<button type="submit" name="booking" class="btn btn-primary"><a style="color:white;" href="book.php">BOOK NOW</a></button>
                <br>
                <br>
                
                
                
                
                
<!--Star Rating  -->
  
     
     

  
<!-- Blog Comments -->
<?php 

    if(isset($_POST['create_comment'])) {

         $the_post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
       


         if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

            $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'unapproved',now())";

            $create_comment_query = mysqli_query($connection, $query);

            if (!$create_comment_query) {
                die('QUERY FAILED' . mysqli_error($connection));


            }


        }


    }
                
           ?>     
                
                                
                







                <!-- Comments Form -->
                <div class="well">
                
                <style>
                    
                    .orange{
                        color: orange;
                    }
                    .yellow{
                        color: yellow;
                    }
                    .stars{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 20px;
                    }
                    
                    .star{
                        list-style: none;
                        font-size: 2rem;
                        padding-left: 10px;
                    }
                    
                    
            </style>
            
            
            <div  class="star-rating" align="center" style="background: #000; padding: 50px;color:white;">
                   <ul class="stars">
                    <li class="star"> <i class="fa fa-star fa-2x"></i></li>
        <li class="star"> <i class="fa fa-star fa-2x"></i></li>
        <li class="star"> <i class="fa fa-star fa-2x"></i></li>
        <li class="star"> <i class="fa fa-star fa-2x"></i></li>
        <li class="star"> <i class="fa fa-star fa-2x"></i></li>
                    </ul>
                    <br>
                    <br>
        <p id="demo"> Ratings </p>
        
        <br><br>
       
    </div>
    
     
                <script>
                
                    const stars = document.querySelectorAll('.star');
                     const output = document.querySelectorAll('.output');
                    
                                     
                    
                    for(x=0;x<stars.length;x++){
                        stars[x].starValue = (x+1);
                        
                        ["click","mouseover","mouseout"].forEach(function(e){
                            stars[x].addEventListener(e,showRating);
                           
                        })
                    }
                    function showRating(e){
                        let type = e.type;
                        let starValue = this.starValue;
                        
                        if(type === 'click'){
                             document.getElementById("demo").innerHTML = "You rated it "+starValue + " stars.";
                        }
                     
                        stars.forEach(function(elem,ind){
                            if(type==='click'){
                                if(ind<starValue){
                                    elem.classList.add("orange");
                                }
                                else{
                                    elem.classList.remove("orange");
                                }
                                
                                
                            }
                            
                            if(type==='mouseover'){
                                if(ind<starValue){
                                    elem.classList.add("yellow");
                                }
                                else{
                                    elem.classList.remove("yellow");
                                }
                            }
                            
                            
                            if(type==='mouseout'){
                               
                                    elem.classList.remove("yellow");
                                }
                               
                            
                        }
                    )}
                    
                    
                    
                
                </script>



            <h4>Leave your feedback :</h4>
            <form action="#" method="post" role="form">
                
                

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author" required>
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email" required>
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" id="body" rows="3" required></textarea>
                </div>
                
                
               <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
       
     


                <hr>
               
                
            <?php 


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                
                ?>
                
                
                           <!-- Comment -->
                <div class="media">
                     
                    <a class="pull-left" href="#">
                        <img class="media-object" height="100px" width="100px" src="https://www.iconninja.com/files/634/848/842/man-user-customer-icon.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;   ?>
                            <small><?php echo $comment_date;   ?></small>
                        </h4>
                        
                        <?php echo $comment_content;   ?>
 
                    </div>
                </div>
     
                
  

           <?php }  }   else {


            header("Location: index.php");


            }
                ?>
           
                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>


<?php include "include/footer.php"; ?>






    