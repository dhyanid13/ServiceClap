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
<style>
    .checked{
       color: gold;
    }

</style>
<br>
       <br>
       <br>
       <br>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    How can we help?
                    <small>Trending Today</small>
                </h1>
                <?php
    
                $query="SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)){
                    $post_id=  $row['post_id'];
                    $post_title=  $row['post_title'];
                    $post_author=  $row['post_author'];
                    $post_date=  $row['post_date'];
                    $post_image=  $row['post_image'];
                    $post_content= substr($row['post_content'],0,100);
                   ?>
                   
                    
                
                

                <!-- First Blog Post -->
                <h2>
                    <a style="color:#0077b6" href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a style="color:#00b4d8" href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
              
                
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <br>
                </a>
                 <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                <p><?php echo $post_content?></p>
                <a style="background-color:#00b4d8" class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

              

                <?php }
    
                ?>

                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

































            