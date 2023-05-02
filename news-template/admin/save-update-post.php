<?php
include 'database.php';
$obj= new Database();

if(empty($_FILES['new-image']['name'])){
    $file_name= $_POST['old-image'];
}else{
    $errors= array();

    $file_name= $_FILES['new-image']['name'];
    $file_size= $_FILES['new-image']['size'];
    $file_tmp= $_FILES['new-image']['tmp_name'];
    $file_type= $_FILES['new-image']['type'];
    $file_ext=strtolower(end(explode('.',$file_name))); //(abc.jpg) after this end function gives jpg and then to lower function will lower if capital letter
    $extension= array("jpeg", "jpg", "png");

    if(in_array($file_ext,$extension) === false){
        $errors[]="This extension file is not allowed, Please choose jpg, png files";
    }
    //1kb = 1024 bits and 1mb = 1024 kbs then 2x(1024*1024)= 2mbs
    if($file_size > 2097152){
        $errors[]="File size must be 2MB or lower.";
    }
    if(empty($errors)== true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($errors);
    }
}

$post_id= $_POST['post_id'];
$title=$obj->realEscapeString($_POST['post_title']); 
$description=$obj->realEscapeString($_POST['postdesc']); 
$category=$obj->realEscapeString($_POST['category']);

$array=[
    'title' => $title,
    'description' => $description,
    'category' => $category,
    'post_img' =>  $file_name
];

$obj->update("post",$array,"post_id= $post_id;");

// $sql= "UPDATE post set title= '$title',description= '$description',category='$category',post_img='$file_name' where post_id= $post_id;";
// echo $file_name;
// $sql .= "Update category set post= post-1 where category_id= $category";
// $obj->sqlQuery($sql);

header('Location: http://localhost/class3PHP/news-template/admin/post.php');

?>