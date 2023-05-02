<?php 
include 'header.php';
include_once 'database.php';
$limit=3;
$obj= new Database();
$search= $_GET['search'];
$obj->select('post','*'," category on post.category=category.category_id JOIN user on post.author=user.user_id"," post.title LIKE '%$search%' OR post.description LIKE '%$search%' OR category.category_name LIKE '%$search%' ","post_id DESC",$limit);
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">Search: <?php echo $search; ?></h2>
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
}else{
   echo "<h2 style= 'color: #0199AD;' >NO RECORD FOUND</h2>";
}
echo $obj->pagination('post'," category on post.category=category.category_id JOIN user on post.author=user.user_id "," post.title LIKE '%$search%' OR post.description LIKE '%$search%' OR category.category_name LIKE '%$search%' ",$limit,"search=$search&"); 
?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
