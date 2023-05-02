<?php 
include "header.php";
include 'database.php';
$obj= new Database();
$limit=3;
$obj->select('post','*'," category on post.category=category.category_id JOIN user on post.author=user.user_id",null,"post_id DESC",$limit);
 $result=$obj->getResult();
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
<?php
if(count($result)>0){
    foreach($result as $row)  { 

?>
                          <tr>
                              <td class='id'><?php echo $row['post_id']; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><?php echo $row['post_date']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td class='edit'><a href='update-post.php?post_id=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?post_id=<?php echo $row['post_id']; ?>&category=<?php echo $row['category']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
<?php 
}
} 
?>
                      </tbody>
                  </table>
<!--  Pagination -->
<?php

echo $obj->pagination('post',null,null,$limit,null); 

?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
