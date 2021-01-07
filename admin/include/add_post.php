<?php
   if(isset($_POST['create_post'])){
       
            $post_title        = $_POST['title'];
            $post_author       = $_POST['author'];
            $post_category_id  = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tag       =       $_POST['post_tag'];
            $post_content      = $_POST['post_content'];
            $post_date         = date('d-m-y');
            $post_comment_count = 4;

             move_uploaded_file($post_image_temp, "../images/$post_image" );
       
       
       $query = "INSERT INTO posts(post_category_id, post_title, post_author,post_date,post_image,post_content,post_tag,post_comment_count,post_status) ";
       
       $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tag}','{$post_comment_count}', '{$post_status}') "; 
             
       
       $create_post_query = mysqli_query($connection, $query);  
       
       $the_post_id=mysqli_insert_id($connection);
       //confirm($create_post_query);
       echo "<p class='bg-success'>Post Created . <a href='../post.php?p_id={$the_post_id}'> View Post</a> </p> ";
       
   }
    
           ?>
           
           

    <style>

       
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
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="title" required>
      </div>
      
      <div class="form-group">
         <label for="author">Post Author</label>
          <input type="text" class="form-control" name="author" required>
      </div>
     
     <div class="form-group">
       <label for="categories">Categories</label>
       <select name="post_category" id="">
           
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

      </div>

      
      
      
      <div class="form-group">
         <label for="post_status">Post Status</label>
         
         <select name="" id="">
             <option value="draft">Select Options</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
          <input type="text" class="form-control" name="post_status">
      </div>
      
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file" name="image">
      </div>
      
     <div class="form-group">
         <label for="post_tag">Post Tags</label>
          <input type="text" class="form-control" name="post_tag">
      </div>
      
     <div class="form-group">
         <label for="post_content">Post Content</label>
          <textarea class="form-control" name="post_content" id="body" cols="30" rows="10" required>
         </textarea>
      </div>
      
     
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
    
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js">


</script>


<script>
ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


    