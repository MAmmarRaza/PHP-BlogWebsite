<?php 
include "header.php"; 
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
include "database.php";
$obj= new Database();

if(isset($_POST['submit'])){
    $category_pid=$_POST['cat_id'];
    $cat= $obj->realEscapeString($_POST['cat_name']);
        $array= [
            'category_name'=>$cat,
        ];
        $obj->update('category',$array,"category_id={$category_pid}");
        header('Location: http://localhost/class3PHP/news-template/admin/category.php');
}

$category_gid=$_GET['cat'];
$result= $obj->select('category','*',null,"category_id=$category_gid",null,null);
while($row=mysqli_fetch_assoc($result)) { 
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="<?php $_GET['cat']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php 
}
include "footer.php"; 
?>
