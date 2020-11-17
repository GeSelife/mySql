<?php
///*
// * 连接数据库  mysqli
// *
// * 选择数据库
// *
// * CRUD
// *
// */
////输出所有相关信息
////echo phpinfo();
////连接数据库
////阿帕奇 默认80端口
////mysql 默认3306端口
////连接数据库（域名,用户名,密码,数据库名字,端口）*******************************************************
//$mysql = new mysqli('localhost','root','','wuif2000','3306');
////判断数据库是否连接成功
//var_dump($mysql->connect_error); //返回0 连接成功
////连接失败终止
//if($mysql->errno){
//    echo '数据库连接失败，失败原因' .$mysql->connect_error;
//    //终止指令
////    exit();
//    die();
//}
//
////建表时设置字符集
//$mysql->query("set names utf8");
//
////$sql = "SELECT goods_id,goods_name,shop_price FROM goods WHERE goods_id=4";
//
////结果集  fetch_all
////$result = $mysql->query($sql);
////$result = $mysql->query($sql)->fetch_all(MYSQLI_NUM);//结果集转数组-字符集转换
///*
// * 转换类型
// * MYSQLI_ASSOC  关联数组
// * MYSQLI_BOTH   关联数组和索引数组都有
// * MYSQLI_NUM    索引数组
// */
//
////一条结果  fetch_assoc
////$result = $mysql->query($sql)->fetch_assoc();
//
////
//$sql ="UPDATE goods SET goods_name = '华为' WHERE goods_id = 4";
//
//$mysql->query($sql);
////影响的行数
//$result = $mysql->affected_rows;
//var_dump($result); //true
////echo $result; //1
//
//$mysql->close();
//
//?>

<?php
//$mysql = new mysqli('localhost','root','','wuif2008','3306');
////判断数据库是否连接成功
////var_dump($mysql->error); //返回0 连接成功
////连接失败终止
//if($mysql->connect_error){
//    echo '数据库连接失败，失败原因' .$mysql->connect_error;
//    exit();
//}
//
////建表时设置字符集
//$mysql->query("set names utf8");
include_once './public.php';

$sql = "SELECT * FROM teacher GROUP BY id ASC";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);


$mysql->close();

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>可编辑表单-同步</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-offset-2">
            <table class="table">
                <tr>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>岗位</th>
                    <th>修改</th>
                    <th>删除</th>
                </tr>
                <?php foreach ($result as $value){

                ?>
                <tr>

                    <td>
                        <?php
                        echo $value['names'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $value['age'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $value['sex'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $value['job'];
                        ?>
                    </td>
                    <td>
                        <a href="one.php?id=<?php echo $value['id']?>">修改</a>
                    </td>

                    <td>
                        <a href="delete.php?id=<?php echo $value['id']?>">删除</a>
                    </td>
                </tr>

                <?php }  ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="add.php">添加</a>
                    </td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
        </div>
    </div>
</div>
</body>
</html>

