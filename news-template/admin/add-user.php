<?php 

include "header.php"; 
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
include 'database.php';
$obj=new Database();

if(isset($_POST['save'])){
    $fname= $obj->realEscapeString($_POST['fname']);
    $lname= $obj->realEscapeString($_POST['lname']);
    $user= $obj->realEscapeString($_POST['user']);
    $password= $obj->realEscapeString(md5($_POST['password']));
    $role= $obj->realEscapeString($_POST['role']);

    // if already exist then show message otherwise insert data;
    $obj->select("user","username",null,"username='{$user}'",null,null);
    $result= $obj->getResult();
    if(count($result)>0){
        echo "<p style='color:red;text-align:center;margin:10px 0px;' > Username Already Exist! </P>";
    }else{
        $array= [
            'first_name'=>$fname,
            'last_name'=>$lname,
            'username'=>$user,
            'password'=>$password,
            'role'=>$role
        ];
        $obj->insert('user',$array);
        header('Location: http://localhost/class3PHP/news-template/admin/users.php');
    }


}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
