<?php
include 'header.php';
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
include 'database.php';
$obj= new Database();
$category_id= $_GET['cat'];

$obj->delete("category","category_id={$category_id}");
header('Location: http://localhost/class3PHP/news-template/admin/category.php');


?>

