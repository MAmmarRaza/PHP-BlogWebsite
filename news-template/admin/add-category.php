<?php 
include "header.php"; 
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
include 'database.php';
$obj=new Database();

if(isset($_POST['save'])){
    $cat= $obj->realEscapeString($_POST['cat']);

    // if already exist then show message otherwise insert data;
    $obj->select("category","category_name",null,"category_name='{$cat}'",null,null);
    $result=$obj->getResult();
    if(count($result)>0){
        echo "<p style='color=red;text-align=center;margin=10px 0px;' > category_name Already Exist! </P>";
    }else{
        $array= [
            'category_name'=>$cat,
        ];
        $obj->insert('category',$array);
        header('Location: http://localhost/class3PHP/news-template/admin/category.php');
    }


}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
