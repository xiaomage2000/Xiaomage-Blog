<?php

$sql_server = "sql_server";
$sql_user = "sql_username";
$sql_pass = "sql_password";
$sql_dbname = "xiaomage_blog";

$connect2 = new mysqli("$sql_server","$sql_user","$sql_pass","$sql_dbname");
mysqli_set_charset($connect2,"utf8");
$sql2 = "SELECT * FROM  blog_user";
$data2 = $connect2->query( $sql2 );
$datas2 = $data2->fetch_array( MYSQLI_ASSOC );

if ((isset($_COOKIE["username"]) && isset($_COOKIE["passwords"])) && ((strcmp($_COOKIE["username"],$datas2['username']) == 0 )&& (strcmp($_COOKIE["passwords"],$datas2['passwords']) == 0))){
    $logined = 1;
}else {
    $logined = 0;
}

mysqli_close($connect2);

?>