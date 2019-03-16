<?php

require_once './dataBase.php';

$login_Connect = $getData->connect( $sql_server,$sql_user,$sql_pass,$sql_dbname );
$login_Sql = "SELECT * FROM  blog_user";
$login_Data = $getData->getSmallerData( $login_Sql,$login_Connect );

if ((isset($_COOKIE["username"]) && isset($_COOKIE["passwords"])) && ((strcmp($_COOKIE["username"],$login_Data['username']) == 0 )&& (strcmp($_COOKIE["passwords"],$login_Data['passwords']) == 0))){
    $logined = 1;
}else {
    $logined = 0;
}

class accessDenied
{
    public function isAccessDenied($logined)
    {
        if ($logined == 0) {
            echo header('Location: ./accessDenied.php');
        }
    }
}

$accessDenied = new accessDenied();
?>