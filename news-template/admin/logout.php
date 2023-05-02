<?php

include 'database.php';
$obj= new Database();
session_start();
session_unset();
session_destroy();

header('Location: http://localhost/class3PHP/news-template/admin/');

?>
