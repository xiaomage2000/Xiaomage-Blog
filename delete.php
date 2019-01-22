<?php

include './islogin.php';

if ($logined == 0) {
    echo header('Location: ./access_denied.php');
}

date_default_timezone_set("PRC");
$connect = new mysqli("127.0.0.1","root","","xiaomage_blog");
mysqli_set_charset($connect,"utf8");
$del_id=$_GET["id"];
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
    <link rel="stylesheet" href="./css/others.style.css">
    <title>删除此文章 - Xiaomage's Blog</title>
</head>

<body>
    <div id="flame">
        <div id="tittle">
            <div style="margin-bottom:5px;">
                <a href="./index.php" id="big_tittle">Xiaomage's Blog</a>
            </div>
            <div style="color: #999;">Mayme I'm a geek! Even if it isn't archive now. 嘤嘤嘤 QAQ...</div>
            <div id="nav">
                <div class="nav_div"><a href="./index.php">&nbsp;&nbsp;博客主页_Index&nbsp;&nbsp;</a></div>
                <div class="nav_div"><a href="./new_post.php">&nbsp;&nbsp;新文章_New Post&nbsp;&nbsp;</a></div>
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
            <div id="blog_container">
                <div id="blog_tittle">
                    删除此文章
                </div>
                <div id="del_content">
                    您确定要删除此文章吗？<br><br>这将导致这篇文章从数据库中<span class="highlight">永久删除</span>，并且删除过程<span class="highlight">不可逆</span>！
                </div>
                <div id="blog_options">
                    <div class="blog_option"><a href="./deleted.php?id=<?php echo $del_id?>"><span class="highlight">&nbsp;&nbsp;确定！&nbsp;</span></a></div>
                    <div class="blog_option"><a href="./index.php">&nbsp;&nbsp;我再想想吧~&nbsp;&nbsp;</a></div>
                </div>
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
            <div>©2019 Xiaomage's Blog.All Rights Reserved.</div>
            <div>Made by ♥</div>
        </div>
    </div>
</body>

</html>