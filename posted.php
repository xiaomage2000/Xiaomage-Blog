<?php

include './islogin.php';

$flag=1;
$flag1=1;
$connect = new mysqli("server","your dbusername","dbpassword","dbname");

mysqli_set_charset($connect,"utf8");

if (mysqli_connect_error()){
    $flag=0;
}else{
    $flag=1;
}

$tittle=$_POST["tittle"];
$author=$_POST["author"];
$post_time=time();
$content=$_POST["content"];

if ($tittle == NULL || $author == NULL ||$content == NULL)
{
    $flag = 0;
    $flag1 = 0;
}

if ($flag1 == 1)
{
$sql = "INSERT INTO xiaomage_blog ( tittle, author, post_time, content) VALUES ('$tittle','$author','$post_time','$content')";
$connect->query( $sql );
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="zh_cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/index.style.css">
    <link rel="stylesheet" href="./css/new_post.style.css">
    <title>发布<?php
                if ($flag==1 && $flag1 == 1) echo '成功';
                else echo '失败';
                ?> - Xiaomage's Blog</title>
</head>

<body>
<div id="background-img"></div>
<div id="background">
    <div id="flame">
        <div id="tittle">
            <div style="margin-bottom:5px;">
                <a href="./index.php" id="big_tittle">Xiaomage's Blog</a>
            </div>
            <div style="color: #999;">Mayme I'm a geek! Even if it isn't archive now. 嘤嘤嘤 QAQ...</div>
            <div id="nav">
                <div class="nav_div"><a href="./index.php">&nbsp;&nbsp;博客主页_Index&nbsp;&nbsp;</a></div>
                <?php if ( $logined == 1) { ?>
                <div class="nav_div"><a href="./new_post.php">&nbsp;&nbsp;新文章_New Post&nbsp;&nbsp;</a></div>
                <?php } ?>
                <div class="nav_div"><a href="./search.php">&nbsp;&nbsp;搜索_Search&nbsp;&nbsp;</a></div>
                <?php if ($logined == 1) { ?>
                    <div class="nav_div"><a href="./logout.php">&nbsp;&nbsp;登出_Logout&nbsp;&nbsp;</a></div>
                <?php } else {?>
                    <div class="nav_div"><a href="./login.php">&nbsp;&nbsp;登录_Login&nbsp;&nbsp;</a></div>
                <?php } ?>
                <div class="nav_div"><a href="https://xmgspace.me">&nbsp;&nbsp;真正的博客_xmgspace.me&nbsp;&nbsp;</a></div>
            </div>
        </div>
        <div id="main">
            <div id="left">
                <div id="new_post_tittle">发布<?php
                if ($flag==1) echo '成功 o(*￣▽￣*)ブ';
                else echo '失败...QAQ';
                ?></div>
                <div id="back">
                    <?php if ($flag1 == 0){?>
                    <div>发布前请先确保标题、作者或文章内容不为空哦~<br><br></div>
                    <?php }?>
                    <a href="./index.php">点击<span style="color: #3354AA">这里</span>回到首页~~ </a>
                </div>
            </div>

            <div id="right">
                <div id="about_tittle">
                    关于我_about me
                </div>
                <div id="about_content">
                    Welcome to Xiaomage's Blog!<br><br>
                    这里是马云龙的个人博客（伪）。<br>
                    基本的UI框架都是自己写的，所以有（非）些（常）丑。第一次自己写博客，有不正确的地方还希望多多指教:-)<br><br>
                    我真正的博客是使用开源博客软件typecho搭建的，主题是同龄的一位大神写的，自己现在还写不出来 QWQ...<br><br>
                    In all,欢迎拍砖~
                    <a href="https://xmgspace.me" style="color: #3354AA;">传送门➡https://xmgspace.me</a><br>
                    虽然有点零糖麦片，章口就莱...
                </div>
            </div>
        </div>

        <div id="bottom">
            <div>©2019 Xiaomage's Blog. All Rights Reserved.</div>
            <div><a href="https://github.com/xiaomage2000/Xiaomage-Blog" style="color: #999;">Made with ♥ &nbsp;&nbsp;Version : v 1.2</a></div>
        </div>
    </div>
</div>
</body>

</html>
