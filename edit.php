<?php

include './islogin.php';

if ($logined == 0) {
    echo header('Location: ./access_denied.php');
}

$connect = new mysqli("$sql_server","$sql_user","$sql_pass","$sql_dbname");
mysqli_set_charset($connect,"utf8");

$edit_id = $_GET["id"];
$sql = "SELECT * FROM $sql_dbname WHERE id = $edit_id";
$data = $connect->query( $sql );
$data_arrays = [];
while ( $data_array = $data->fetch_array( MYSQLI_ASSOC ) )
{
    $data_arrays[] = $data_array;
}

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
    <link rel="stylesheet" href="./css/others.style.css">
    <title>编辑此文章 - Xiaomage's Blog</title>
</head>

<body>
    <div id="background-img"></div>
    <div id="background">
        <div id="flame">
            <div id="title">
                <div style="margin-bottom:5px;">
                    <a href="./index.php" id="big_title">Xiaomage's Blog</a>
                </div>
                <div style="color: #999;">Mayme I'm a geek! Even if it isn't archive now... </div>
                <div id="nav">
                    <div class="nav_div"><a href="./index.php">&nbsp;&nbsp;博客主页_Index&nbsp;&nbsp;</a></div>
                    <?php if ( $logined == 1) { ?>
                    <div class="nav_div"><a href="./new_post.php">&nbsp;&nbsp;新文章_New Post&nbsp;&nbsp;</a></div>
                    <?php } ?>
                    <div class="nav_div"><a href="./search.php">&nbsp;&nbsp;搜索_Search&nbsp;&nbsp;</a></div>
                    <?php if ($logined == 1) { ?>
                    <div class="nav_div"><a href="./admin.php">&nbsp;&nbsp;管理Blog_Admin&nbsp;&nbsp;</a></div>
                    <?php } else {?>
                    <div class="nav_div"><a href="./login.php">&nbsp;&nbsp;登录_Login&nbsp;&nbsp;</a></div>
                    <?php } ?>
                    <div class="nav_div"><a href="https://xmgspace.me">&nbsp;&nbsp;真正的博客_xmgspace.me&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
            <div id="main">
                <div id="left">
                    <div id="new_post_title">编辑此文章</div>
                    <?php foreach( $data_arrays as $data_array ){?>
                    <div id="new_post_flame">
                        <form action="./edited.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $data_array['id']?>"><br>
                            标题：<input type="text" name="title" style="width:45%;height:20px;"
                                value="<?php echo $data_array['title']?>"  required><br>
                            作者：<input type="text" name="author" style="width:45%;height:20px;"
                                value="<?php echo $data_array['author']?>"  required><br>
                            文章内容：<br><textarea name="content"
                                style="width:85%;height:320px;"  required><?php echo $data_array['content']?></textarea><br><br>
                            <input type="submit" class="post_buttons" value="重新发布">
                        </form>
                    </div>
                    <?php } ?>
                </div>

                <div id="right">
                    <div id="about_title">
                        关于我_about me
                    </div>
                    <div id="about_content">
                        Welcome to Xiaomage's Blog!<br><br>
                        这里是马云龙的个人博客（伪）。<br>
                        基本的UI框架都是自己写的，所以有（非）些（常）丑。第一次自己写博客，有不正确的地方还希望多多指教:-)<br><br>
                        我真正的博客是使用开源博客软件typecho搭建的，主题是同龄的一位大神写的，自己现在还写不出来 QWQ...<br><br>
                        In all,欢迎拍砖~
                        <a href="https://xmgspace.me" style="color: #3354AA;">传送门➡https://xmgspace.me</a><br>
                        
                    </div>
                </div>
            </div>

            <div id="bottom">
                <div>©2019 Xiaomage's Blog. All Rights Reserved.</div>
                <div><a href="https://github.com/xiaomage2000/Xiaomage-Blog" style="color: #999;">Made with ♥
                        &nbsp;&nbsp;Version : v 1.3</a></div>
            </div>
        </div>
        <div>
</body>

</html>