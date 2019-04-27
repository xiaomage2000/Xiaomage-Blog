# Xiaomage-Blog
我的第一个PHP项目，Xiaomage's Blog（伪）

萌新看完相关教程视频后制作的第一个小项目，请dalao轻喷...

数据库的名称是xiaomage_blog，内有三张表，名称分别是blog_comment，存储评论；blog_user，存储用户名密码；xiaomage_blog，存储文章内容。

详情请见：
 [https://xmgspace.me/archives/27/](https://xmgspace.me/archives/27/)

 Demo:
 [https://lab.xmgspace.me/web_learning/6th/index.php](https://lab.xmgspace.me/web_learning/6th/index.php)

 Xiaomage's Lab:
  [https://lab.xmgspace.me/](https://lab.xmgspace.me/)

# 更新日志：
#### 2019.1.21 v 1.0 发布

经过更新，现在Xiaomage's Blog（伪）已经支持登录和留言板功能了，并且能够对文章进行翻页，更好的完成了需求。

我也将继续更新，修复未知的Bug，改善功能。

#### 2019.1.22 v 1.1 发布

1.非登录状态下，新文章_New Post、编辑此文章和删除此文章的连接将不再出现在页面上，必须登录才能显示并进行操作；

2.搜索结果支持分页显示；

3.撰写新文章时，作者将自动从COOKIE中提取，不必再输入，若想更改作者，需要发布后再编辑此文章。

4.Some bugs fix.

#### 2019.2.16 v 1.2 发布

1.对评论区进行了大的升级，去掉了原来在首页的留言板，每篇文章的评论区分开，使得Xiaomage`s Blog更加完善。

2.点击文章标题即可详细阅读并查看或留下评论。

3.部分页面CSS优化，加入页面背景。背景图片来自动漫《我们仍未知道那天所看见的花的名字。》吹爆这部动漫！



#### 2019.2.28 v 1.3 发布

1.加入了管理页面，可以在这个页面中退出登录，更改密码，删除文章，编辑文章等，更像专业博客的控制面板。

2.改进了登录状态确认的代码，修复漏洞。

3.一些小的改进，如css引入媒体查询等，另外移除大量卖萌元素QWQ...



#### 2019.3.15 v 1.4 发布

1.重构部分执行代码，将部分代码与纯HTML剥离开来，通过类与对象，增强可维护性。

2.删除修改了一些无用的代码，减少代码冗余。

3.加入了评论的用户记忆功能，通过session实现，用户第一次留言需要输入昵称，在不清除cookies的情况下，以后则不需要再次输入。



#### 2019.4.27
1.Update license.

2.停止开发，开发重心转移到另一个可用的项目上，一个使用MDUI和laravel实现的todo list.
