<?php 
include "header.php";
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
include "database.php";
$obj= new Database();
$obj->select('user','*',null,null,"user_id DESC",3); 
$result= $obj->getResult();
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>

                      <tbody>
<?php
if(count($result)>0){
    foreach($result as $row)  {

?>
                          <tr>
                              <td class='id'><?php echo $row['user_id']; ?></td>
                              <td><?php echo $row['first_name']. " ". $row['last_name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php echo $row['role']; ?></td>
                              <td class='edit'><a href='update-user.php?user_id=<?php echo $row['user_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?user_id=<?php echo $row['user_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
<?php 
}
} 
?> 
                      </tbody>
                  </table>
<!--  Pagination -->
<?php

echo $obj->pagination('user',null,null,3,null); 


?>
              </div>
          </div>
      </div>
  </div>

