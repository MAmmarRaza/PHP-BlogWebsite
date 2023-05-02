<?php 
include "header.php";
include "database.php";
$obj= new Database();

if(isset($_POST['submit'])){
    $post_pid=$_POST['user_id'];
    $title= $obj->realEscapeString($_POST['f_name']);
    $description= $obj->realEscapeString($_POST['l_name']);
    $cat= $obj->realEscapeString($_POST['category']);
    $role= $_POST['new-image'];


        $array= [
            'title'=>$title,
            'description'=>$description,
            'category'=>$cat,
            'role'=>$role
        ];
        $obj->update('user',$array,"user_id={$user_pid}");
        header('Location: http://localhost/class3PHP/news-template/admin/users.php');
}


$post_id=$_GET['post_id'];
$obj->select('post','*'," category on post.category=category.category_id JOIN user on post.author=user.user_id"," post_id= $post_id ","post_id DESC",null);
$result= $obj->getResult();
foreach($result as $row) { 
?> 
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'] ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo $row['description'] ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
<?php 
    $obj->select("category","*",null,null,null,null);
    $result1= $obj->getResult();
    foreach($result1 as $row1){
        if($row1['category_id']==$row['category']){
            $select= 'selected';
        }else{
            $select="";
        }
        echo "<option $select value=".$row1['category_id'].">". $row1['category_name']." </option>";
 } 
 ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image" >
                <img  src="upload/<?php echo $row['post_img'] ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img'] ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php
} //end of while loop
 include "footer.php"; ?>
