<?php
include 'header.php';
include 'database.php';
$obj= new Database();
$post_id= $_GET['post_id'];

$obj->delete("post","post_id={$post_id};");
// $array=[
//     'post' => (int)'post' - 1
// ];
// echo $obj->update("category",$array,"category_id={$_GET['category']}");

$obj->select("category","post",null,null,"category_id= '{$_GET['category']}'",1);
$result=$obj->getResult();
$postNumber=$result[0]['post'];

// $sql1 = "Update category set post= post+1 where category_id= $category";
$obj->update('category',array('post' => $postNumber-1)," category_id= '{$_GET['category']}'");
header('Location: http://localhost/class3PHP/news-template/admin/post.php');

?>