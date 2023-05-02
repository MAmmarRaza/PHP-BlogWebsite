<?php 
include 'header.php'; 
include_once 'database.php';
$obj= new Database();
$cat_id= $_GET['cat_id'];
$cat_name= $_GET['cat_name'];
$obj->select('post','*'," category on post.category=category.category_id JOIN user on post.author=user.user_id"," category_id= $cat_id ","post_id DESC",3); 
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">Category: <?php echo $cat_name; ?></h2>
<?php 
$result= $obj->getResult();
if(count($result)>0){
    foreach($result as $row){ 
?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?post_id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img'];?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?post_id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?cat_id=<?php echo $row['category']; ?>&cat_name=<?php echo $row['category_name']; ?>'><?php echo $row['category_name']; ?></a>
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
                                    <p class="description">
                                    <?php echo substr($row['description'],0,130) . "..."; ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?post_id=<?php echo $row['post_id']; ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
<?php 
    }
}
echo $obj->pagination('post',null," category='$cat_id' ",3,"cat_id=$cat_id&cat_name=$cat_name&"); 

?>      
                   
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
