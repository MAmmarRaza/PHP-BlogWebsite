<?php 
include 'header.php'; 
include_once 'database.php';
$obj= new Database();
$post_id=$_GET['post_id'];
$obj->select('post','*'," category on post.category=category.category_id JOIN user on post.author=user.user_id"," post_id= $post_id ","post_id DESC",null);
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
 <?php 
$result= $obj->getResult();
if(count($result)>0){
    foreach($result as $row){  
?>
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $row['category_name']; ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?user_id=<?php echo $row['user_id']; ?>&username=<?php echo $row['username']; ?>'><?php echo $row['username']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                            <p class="description">
                            <?php echo $row['description']; ?>
                            </p>
                        </div>
                    </div>
<?php 
} //end of while loop
} //end of if else
?>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php

include 'footer.php'; ?>
