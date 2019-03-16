<?php

require_once './isLogin.php';
require_once './dataBase.php';

// 注释 By Xiaomage
if (isset($_GET['page'])){
    $page = $_GET['page'];
}
else $page=1; //确定当前页数
$per_page = 4; //每页显示的文章数量
$start_form = ($page-1) * $per_page; //查询起始点，每页显示4条

$connect = $getData->connect($sql_server,$sql_user,$sql_pass,$sql_dbname);
$sql = "SELECT * FROM $sql_dbname ORDER BY id DESC LIMIT $start_form,$per_page";
$get_total  = "SELECT COUNT(*) FROM $sql_dbname";
$total = $getData->getTotal($get_total,$connect);
$data_arrays = $getData->getMainContent($sql,$connect);

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
    <title>Xiaomage's Blog</title>
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
                    <div id="blog_container">
                        <?php
                    foreach( $data_arrays as $data_array )
                    {
                ?>
                        <div id="blogs">
                            <div id="blog_title"><a id="title_a"
                                    href="./read.php?article_id=<?php echo $data_array['id'] ?>"><?php echo $data_array['title']?></a>
                            </div>
                            <div id="blog_author"><?php echo 'By&nbsp;&nbsp;'.$data_array['author']?></div>
                            <div id="blog_time">
                                <?php echo '发布时间: '.date( "Y-m-d H:i:s", $data_array['post_time']).'&nbsp;&nbsp;&nbsp;'?>
                                <?php if ($data_array['edit_time'] != NULL)
                        echo ('此文章于'.date( "Y-m-d H:i:s", $data_array['edit_time'] ).'被编辑');
                        ?>
                            </div>
                            <div id="blog_content"><?php echo $data_array['content']?></div>
                            <hr>
                        </div>
                        <?php
                    }
                ?>
                        <div id="page_turn">
                            <div class="page_turns"><a class="page_turn_a"
                                    href="./index.php?page=<?php if ($page == 1) echo '1';else echo ($page - 1);?>">
                                    <?php 
                            if ($page == 1) echo '&nbsp;&nbsp;没有更新的文章了&nbsp;&nbsp;';
                            else echo '&nbsp;&nbsp;⬅较新的文章&nbsp;&nbsp;';
                        ?>
                                </a></div>
                            <div class="page_turns" style="margin-right:40px;"><a class="page_turn_a" href="./index.php?page=<?php if (($total - ($page * $per_page)) > 0) echo ($page + 1);
                            else echo ($page);?>">
                                    <?php
                            if (($total - $page * $per_page) > 0) echo '&nbsp;&nbsp;较旧的文章➡&nbsp;&nbsp;';
                            else echo '&nbsp;&nbsp;没有更旧的文章了&nbsp;&nbsp;';
                        ?></a></div>
                        </div>
                    </div>
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
    </div>
</body>

</html>