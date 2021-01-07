<style>
    table{
        padding-top: 30px;
          background-image: linear-gradient(skyblue,white);
        font-size: 16px;
      
    }
    td{
        border: none;
    }
    th{
        background-color: teal;
    }
</style>

                           

                           
                           
                           <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>BokkingId</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Zip</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Service Provide</th>
                                    <th>Contact NO</th>
                                    <th>Address</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
<?php
                                
    $query = "SELECT * FROM booking";
    $select_booking = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_booking)) {
    $book_id = $row['book_id'];
    $custname = $row['custname'];
    $email = $row['email'];
    $zip = $row['zip'];
    $date = $row['date'];
    $service = $row['service'];
    $time = $row['time'];
    $phone = $row['phone'];
    $address = $row['address'];
   
    
//    $post_book_count = $row['post_book_count'];
        
        
        
        
//    $post_date = $row['post_date'];
    echo "<tr>";
    echo "<td>$book_id</td>";
    echo "<td>$custname</td>";
    echo "<td>$email</td>";
        
        
        
        
         
//    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
//        $select_categories_id = mysqli_query($connection,$query);  
//
//        while($row = mysqli_fetch_assoc($select_categories_id)) {
//        $cat_id = $row['cat_id'];
//        $cat_title = $row['cat_title'];
//
//        
//        echo "<td>$cat_title</td>";
//            
//        }

        
        
        
        
    echo "<td>$zip</td>";
    echo "<td>$date</td>";
//    $query = "SELECT * FROM comments WHERE comment_post_id=$post_id";
//    $send_comment_query=mysqli_query($connection,$query);
//    
//    $count_comments=mysqli_num_rows($send_comment_query);
//        
//    
        
    echo "<td>$time</td>";
    echo "<td>$service</td>";
        
    echo "<td>$phone</td>";
    echo "<td>$address</td>";
    
//    echo "<td><a class='btn btn-primary fa fa-eye' href='../post.php?p_id={$post_id}'> View Post</a></td>";
//    echo "<td><a class='btn btn-success fa fa-edit' href='posts.php?source=edit_post&p_id={$post_id}'> Edit</a></td>";
//    echo "<td><a class='btn btn-danger fa fa-trash-o' href='posts.php?delete={$book_id}'> Delete</a></td>";
//    echo "<tr>";  
//                               
   
    }
        
                                                      ?>  
            
                               
                                
                            
                        </tbody>
                        </table>
                        
                        
                        

                        