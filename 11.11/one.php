<?php
//查看选中信息
# 1.选中的是哪一条----查看id：传值->地址啦（GET）查询字符串
# 2.连接数据库
# 3.查看SQL，执行，结果
# 4.关闭数据库
# 5.渲染

$get=$_GET['id'];
//判断是否被设置过
if(!isset($get) || empty($get)){
    echo 'id不能为空';
    exit();
};
//判断是否为空   空或0为true
//empty($get['id']);

include_once './public.php';
//$mysql = new mysqli('localhost','root','','wuif2008','3306');
//if($mysql->errno){
//    echo '数据库连接失败，失败原因' .$mysql->errno;
//    exit();
//}
//
////建表时设置字符集
//$mysql->query("set names utf8");

$sql = "SELECT * FROM teacher WHERE id=$get";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

//var_dump($result);
//var_dump($result[0]['sex']);

$mysql->close();

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $result[0]['names']?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-offset-2">
<!--响应式拷贝表单-->
            <!--提交地址 提交方式  提交类型/内容-->
            <form action="./updata.php" method="post" enctype="application/x-www-form-urlencoded">
                <div class="form-group">
                    <label for="exampleInputEmail1">姓名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="姓名" name="names" value="<?php echo $result[0]['names'];?>">
                </div>
                <div class="form-group">
                    <label>性别</label>
                    <input type="radio" name="sex" <?php echo $result[0]['sex']==='男'?'checked':""?> value="男"> 男
                    <input type="radio" name="sex" <?php echo $result[0]['sex']==='女'?'checked':""?> value="女"> 女
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">年龄</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="年龄" name="age" value="<?php echo $result[0]['age'];?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">岗位</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="岗位" name="job" value="<?php echo $result[0]['job'];?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">
                <button type="submit" class="btn btn-info">提交</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
