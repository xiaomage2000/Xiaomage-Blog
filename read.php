<?php

include './islogin.php';

// 注释 By Xiaomage
if (isset($_GET['article_id'])){
    $article_id = $_GET['article_id'];
}
else $article_id=1; //确定当前文章ID
date_default_timezone_set("PRC");
$connect = new mysqli("$sql_server","$sql_user","$sql_pass","$sql_dbname");
mysqli_set_charset($connect,"utf8");
$sql = "SELECT * FROM $sql_dbname WHERE id='$article_id'";
$data = $connect->query( $sql );
$data_arrays = [];
while ( $data_array = $data->fetch_array( MYSQLI_ASSOC ) )
{
    $data_arrays[] = $data_array;
}

//留言板功能
$connect1 = new mysqli("$sql_server","$sql_user","$sql_pass","$sql_dbname");
mysqli_set_charset($connect1,"utf8");
$sql1 = "SELECT * FROM blog_comment WHERE article_id='$article_id'";
$data1 = $connect1->query( $sql1 );
$data_arrays1 = [];
while ( $data_array1 = $data1->fetch_array( MYSQLI_ASSOC ) )
{
    $data_arrays1[] = $data_array1;
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
                            <?php if ($logined == 1) { ?>
                            <?php } ?>
                            <hr>
                        </div>
                        <?php
                    }
                ?>
                    </div>
                    <div id="comment_title">
                        最新评论_comment
                    </div>
                    <div id="comment_content">
                        <?php
                    if ($data_arrays1 != NULL){
                        foreach ( $data_arrays1 as $data_array1 )
                        {
                    ?>
                        <div>
                            <div>
                                <?php echo $data_array1['comment'];?>
                            </div>
                            <div style="text-align:right;">
                                By <?php echo $data_array1['visitor_name']; ?><br>
                                <?php echo '发布时间: '.date( "Y-m-d H:i:s", $data_array1['comment_time'])?>
                            </div>
                            <hr class="hr1">
                        </div>
                        <?php
                        }
                    }
                    else {echo '当前无评论，来抢沙发吧~';}
                    ?>
                    </div>
                    <div id="comment_box">
                        <div style="color: #3354AA;font-weight: bold;">请写下您的评论：</div><br>
                        <form action="./commented.php" method="post">
                            昵称：<input type="text" name="visitor_name" style="width:50%;height:18px;"
                                placeholder="请输入您的昵称"  required><br><br>
                            您的留言：<br><br><textarea name="comment" placeholder="请输入您的评论"
                                style="width:80%;height:100px;"  required></textarea>
                            <input type="hidden" name="article_id" value="<?php echo $article_id?>"><br>
                            <input type="submit" value=" 提交 " class="blog_option">
                        </form>
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
<?php
mysqli_close($connect);
?>

<title><?php echo $data_array['title'] ?> - Xiaomage's Blog</title>

</html>