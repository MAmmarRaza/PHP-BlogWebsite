<?php 
include "header.php"; 
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
include "database.php";
$obj= new Database();
$obj->select('category','*',null,null,"category_id DESC",3); 
$result=$obj->getResult();
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
<?php 
if(count($result)>0){
    foreach($result as $row)  {
?>
                        <tr>
                            <td class='id'><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td class='edit'><a href='update-category.php?cat=<?php echo $row['category_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?cat=<?php echo $row['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
<?php 
    } 
} 
?>
                    </tbody>
                </table>

<?php
echo $obj->pagination('category',null,null,3,null); 
?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
