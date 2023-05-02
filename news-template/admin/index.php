<?php
session_start();

if(isset($_SESSION['username'])){
    header('Location: http://localhost/class3PHP/news-template/admin/post.php');
}
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/logo.png">
                        <h3 class="heading headingAdmin">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
<?php
include 'database.php';
if(isset($_POST['login'])){
    $obj= new Database();

    $username= $obj->realEscapeString($_POST['username']);
    $password= md5($_POST['password']);
    
    $obj->select('user','*',null,"username='{$username}' AND password='{$password}'",null,null);
    $result = $obj->getResult();
    if(count($result) > 0){
        foreach($result as $row)  { 
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_role'] = $row['role'];
    
            header('Location: http://localhost/class3PHP/news-template/admin/post.php');
        }
    }
}
?>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
