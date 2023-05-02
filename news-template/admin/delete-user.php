<?php
include 'header.php';
if($_SESSION['user_role']=='0'){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
include 'database.php';
$obj= new Database();
$user= $_GET['user_id'];

$obj->delete("user","user_id={$user}");
header('Location: http://localhost/class3PHP/news-template/admin/users.php');

?>

