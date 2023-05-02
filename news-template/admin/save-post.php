<?php
include 'database.php';
$obj= new Database();

if(isset($_FILES['fileToUpload'])){
    $errors= array();

    $file_name= $_FILES['fileToUpload']['name'];
    $file_size= $_FILES['fileToUpload']['size'];
    $file_tmp= $_FILES['fileToUpload']['tmp_name'];
    $file_type= $_FILES['fileToUpload']['type'];
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));
    //$file_ext=strtolower(end(explode('.',$file_name))); //(abc.jpg) after this end function gives jpg and then to lower function will lower if capital letter
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
}else{
    echo 'error';
}
session_start();

$title=$obj->realEscapeString($_POST['post_title']); 
$description=$obj->realEscapeString($_POST['postdesc']); 
$category=$obj->realEscapeString($_POST['category']);
$date= date('d M, Y'); 
$author= $_SESSION['user_id'];

$array=[
    'title' => $title,
    'description' => $description,
    'category' => $category,
    'post_date' => $date,
    'author' => $author,
    'post_img' =>  $file_name
];

//$sql= "INSERT INTO `post`(`title`,`description`,`category`,`post_date`,`author`,`post_img`) Values('$title','$description','$category','$date','$author','$file_name');";
// echo $file_name;
$obj->insert('post',$array);

$obj->select("category","post",null,null,"category_id= $category",1);
$result=$obj->getResult();
$postNumber=$result[0]['post'];

// $sql1 = "Update category set post= post+1 where category_id= $category";
$obj->update('category',array('post' => $postNumber+1)," category_id= $category");

header('Location: http://localhost/class3PHP/news-template/admin/post.php');

?>