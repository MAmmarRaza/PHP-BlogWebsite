<?php 
include "header.php";
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
} 
include "database.php";
$obj= new Database();

if(isset($_POST['submit'])){
    $user_pid=$_POST['user_id'];
    $fname= $obj->realEscapeString($_POST['f_name']);
    $lname= $obj->realEscapeString($_POST['l_name']);
    $user= $obj->realEscapeString($_POST['username']);
    $role= $obj->realEscapeString($_POST['role']);


        $array= [
            'first_name'=>$fname,
            'last_name'=>$lname,
            'username'=>$user,
            'role'=>$role
        ];
        $obj->update('user',$array,"user_id={$user_pid}");
        header('Location: http://localhost/class3PHP/news-template/admin/users.php');
}


$user_id=$_GET['user_id'];
$obj->select('user','*',null,"user_id=$user_id",null,null);
$result= $obj->getResult();
foreach($result as $row) { 
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>" >
                          <?php
                            if($row['role'] == 0){
                               echo " <option value='0' selected >normal User</option>
                               <option value='1'>Admin</option>";
                            }else if($row['role'] == 1){
                                echo " <option value='0'  >normal User</option>
                               <option value='1' selected >Admin</option>";
                            }
                          ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php 
} //end of while loop

?>
