<?php
session_start();
if(!isset($_SESSION['flag']) || !isset($_SESSION['username'])){
    $url ="./login.php";
    $msg ="请登录";
    $scene ="panel-danger";
    include_once 'alert.html';
    exit();
}
$username=$_SESSION['username'];
?>

<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>三杉智能</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/css/u-reset.css">
    <link rel="stylesheet" href="../static/css/main.css">
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_2205050_gf053rzxdzw.css">
    <script src="../static/js/jquery-3.5.1.js"></script>
    <script src="../static/js/main.js"></script>
</head>
<body>
<!--左边 pro-->
<div class="pro">
    <div class="pro_lists">
        <a href="javascript:void(0)" class="pro_listsTitle">三杉智能</a>
        <ul>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-zhuye"></i>
                    主页
                </a>
                <dl>
                    <dd>
                        控制台
                    </dd>
                    <dd>
                        <a href="./nav/add.php" target="main">主页一</a>
                    </dd>
                    <dd>
                        <a href="./nav/index.php" target="main">主页二</a>
                    </dd>
                </dl>

            </li>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-huodongzujian-13"></i>
                    组件
                </a>
                <dl>
                    <dd>栅格</dd>
                    <dd>按钮</dd>
                    <dd>表单</dd>
                    <dd>导航</dd>
                    <dd>选项卡</dd>
                    <dd>进度条</dd>
                    <dd>面板</dd>
                    <dd>徽章</dd>
                    <dd>时间线</dd>
                    <dd>动画</dd>
                    <dd>辅助</dd>
                    <dd>通用弹层</dd>
                    <dd>日期时间</dd>
                    <dd>表格</dd>
                    <dd>分页</dd>
                    <dd>上传</dd>
                    <dd>穿梭框</dd>
                    <dd>树形组件</dd>
                    <dd>颜色选择器</dd>
                    <dd>滑块组件</dd>
                    <dd>评分</dd>
                    <dd>轮播</dd>
                    <dd>流加载</dd>
                    <dd>工具</dd>
                    <dd>代码修饰</dd>
                    <dd>即时聊天</dd>
                </dl>
            </li>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-yemian"></i>
                    页面
                </a>
                <dl>
                    <dd>控制台</dd>
                    <dd>主页一</dd>
                    <dd>主页二</dd>
                </dl>
            </li>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-yingyong"></i>
                    应用
                </a>
                <dl>
                    <dd>控制台</dd>
                    <dd>主页一</dd>
                    <dd>主页二</dd>
                </dl>
            </li>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-relevance"></i>
                    高级
                </a>
                <dl>
                    <dd>控制台</dd>
                    <dd>主页一</dd>
                    <dd>主页二</dd>
                </dl>
            </li>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-yonghu"></i>
                    用户
                </a>
                <dl>
                    <dd>控制台</dd>
                    <dd>主页一</dd>
                    <dd>主页二</dd>
                </dl>
            </li>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-shezhi"></i>
                    设置
                </a>
                <dl>
                    <dd>控制台</dd>
                    <dd>主页一</dd>
                    <dd>主页二</dd>
                </dl>
            </li>
            <li class="pro_listsOne">
                <a href="javascript:void(0)" class="listsA">
                    <i class="iconfont icon-shouquan"></i>
                    授权
                </a>
                <dl>
                    <dd>控制台</dd>
                    <dd>主页一</dd>
                    <dd>主页二</dd>
                </dl>
            </li>
        </ul>
    </div>
</div>

<!--右边 content-->
<div class="content">
    <div>
        <ul>
            <li class="lists-one">
                <i class="iconfont icon-gengduo"></i>
            </li>
            <li>
                <i class="iconfont icon-iconset0401"></i>
            </li>
            <li>
                <i class="iconfont icon-shuaxin"></i>
            </li>
            <li class="lists-last">
                <input type="text" placeholder="搜索...">
            </li>
        </ul>
        <ul>
            <li>
                <i class="iconfont icon-tongzhi"></i>
            </li>
            <li>
                <i class="iconfont icon-icon_theme-114"></i>
            </li>
            <li>
                <i class="iconfont icon-biaoqian"></i>
            </li>
            <li>
                <i class="iconfont icon-screen-full"></i>
            </li>
            <li>
                <?php echo isset($username)?$username:'';?>
                <i class="iconfont icon-xiasanjiaoxing"></i>
            </li>
            <li>
                <i class="iconfont icon-ziyuan"></i>
            </li>
        </ul>
    </div>

    <main>
        <iframe src="./nav/add.php" name="main"></iframe>
    </main>
</div>


</body>
</html>