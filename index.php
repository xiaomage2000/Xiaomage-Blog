<?php
include './islogin.php';
// 注释 By Xiaomage
if (isset($_GET['page'])){
    $page = $_GET['page'];
}
else $page=1; //确定当前页数
$per_page = 4; //每页显示的文章数量
$start_form = ($page-1) * $per_page; //查询起始点，每页显示4条
date_default_timezone_set("PRC");
$connect = new mysqli("127.0.0.1","root","","xiaomage_blog");
mysqli_set_charset($connect,"utf8");
$sql = "SELECT * FROM xiaomage_blog ORDER BY id DESC LIMIT $start_form,$per_page";
$get_total  = "SELECT COUNT(*) FROM xiaomage_blog";
$data = $connect->query( $sql );
$total = $connect->query( $get_total );
$data_arrays = [];
while ( $data_array = $data->fetch_array( MYSQLI_ASSOC ) )
{
    $data_arrays[] = $data_array;
}
$totals = $total->fetch_array();


$connect1 = new mysqli("127.0.0.1","root","","xiaomage_blog");
mysqli_set_charset($connect1,"utf8");
$sql1 = "SELECT * FROM blog_comment ORDER BY id DESC LIMIT 3";
$data1 = $connect1->query( $sql1 );
$data_arrays1 = [];
while ( $data_array1 = $data1->fetch_array( MYSQLI_ASSOC ) )
{
    $data_arrays1[] = $data_array1;
}

;
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
                <?php
                    foreach( $data_arrays as $data_array )
                    {
                ?>
                    <div id="blogs">
                        <div id="blog_tittle"><?php echo $data_array['tittle']?></div>
                        <div id="blog_author"><?php echo 'By&nbsp;&nbsp;'.$data_array['author']?></div>
                        <div id="blog_time"><?php echo '发布时间: '.date( "Y-m-d H:i:s", $data_array['post_time']).'&nbsp;&nbsp;&nbsp;'?>
                        <?php if ($data_array['edit_time'] != NULL)
                        echo ('此文章于'.date( "Y-m-d H:i:s", $data_array['edit_time'] ).'被编辑');
                        ?>
                        </div>
                        <div id="blog_content"><?php echo $data_array['content']?></div>
                        <div id="blog_options">
                            <div class="blog_option"><a href="./edit.php?id=<?php echo $data_array['id'] ?>">&nbsp;&nbsp;编辑此文章&nbsp;&nbsp;</a></div>
                            <div class="blog_option"><a href="./delete.php?id=<?php echo $data_array['id'] ?>">&nbsp;&nbsp;删除此文章&nbsp;&nbsp;</a></div>
                        </div>
                        <hr>
                    </div>
                <?php
                    }
                ?>
                    <div id="page_turn">
                        <div class="page_turns"><a class="page_turn_a" href="./index.php?page=<?php if ($page == 1) echo '1';else echo ($page - 1);?>">
                        <?php 
                            if ($page == 1) echo '&nbsp;&nbsp;没有更新的文章了&nbsp;&nbsp;';
                            else echo '&nbsp;&nbsp;⬅较新的文章&nbsp;&nbsp;';
                        ?>
                        </a></div>
                        <div class="page_turns" style="margin-right:40px;"><a class="page_turn_a" href="./index.php?page=<?php if (($totals[0] - ($page * $per_page)) > 0) echo ($page + 1);
                            else echo ($page);?>">
                        <?php
                            if (($totals[0] - $page * $per_page) > 0) echo '&nbsp;&nbsp;较旧的文章➡&nbsp;&nbsp;';
                            else echo '&nbsp;&nbsp;没有更旧的文章了&nbsp;&nbsp;';
                        ?></a></div>
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
                <div id="about_tittle">
                    最新留言_comment
                </div>
                <div id="comment_content">
                    <?php
                        foreach ( $data_arrays1 as $data_array1 )
                        {
                    ?>
                    <div>
                        <div>
                            <?php echo $data_array1['comment'];?>
                        </div>
                        <div style="text-align:right;">
                            By <?php echo $data_array1['visitor_name']; ?>
                        </div>
                        <hr class="hr1">
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div style="margin-top:40px;">
                    <div style="color: #3354AA;font-weight: bold;">请写下您的留言：</div><br>
                    <form action="./commented.php" method="post">
                        昵称：<input type="text" name="visitor_name" style="width:50%;height:18px;" placeholder="请输入您的昵称"><br><br>
                        您的留言：<br><br><textarea name="comment" placeholder="请输入您的留言" style="width:80%;height:100px;"></textarea>
                        <input type="submit" value=" 提交 " class="blog_option">
                    </form>
                </div>
            </div>
        </div>

        <div id="bottom">
            <div>©2019 Xiaomage's Blog.All Rights Reserved.</div>
            <div>Made by ♥</div>
        </div>
    </div>
</body>
<?php
mysqli_close($connect);
?>
</html>