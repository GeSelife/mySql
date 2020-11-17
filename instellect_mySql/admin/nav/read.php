<?php
//include_once "../../lib/db.php";
include_once "../../lib/db1.php";

/*
 * 1.展示编辑的数据
 *      1.1.当前的数据=>id主键
 *      1.2.从上一个页面传过来
 *      1.3.通过get查询字符串
 *      1.4.读取id=当前点击的id的数据  where id=xx
 *      1.5.一条数据--->fetch_assoc--一维关联数组
 * 2.提交修改
 */
$data = $_GET;
//对参数进行验证
if(!isset($data['id']) || empty($data['id'])){
    $url = './index.php';
    $msg = 'id不能为空';
    $scene = 'panel-danger';
    exit();
}

$id=$data['id'];

//$sql = "SELECT * FROM nav WHERE id=$id";
//$result = $mysql->query($sql)->fetch_assoc();
//var_dump($result);

//
$config=[
    'username'=>'root',
    'password'=>'',
    'dbname'=>'intellect'
];
$db= new Db('nav',$config);
$result = $db->read('id',$id);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title><?php echo $result['nnames']?></title>
</head>
<body>
<form action="./update.php" method="post" enctype="application/x-www-form-urlencoded">
    <div class="form-group">
        <label for="exampleInputEmail1">导航名称</label>
        <input type="text" class="form-control" name="nnames" value="<?php echo $result['nnames']?>" id="exampleInputEmail1" placeholder="请输入导航名称">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">导航地址</label>
        <input type="text" class="form-control" value="<?php echo $result['nurl']?>" name="nurl" id="exampleInputPassword2" placeholder="请输入导航地址">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword3">导航排序</label>
        <input type="text" class="form-control" value="<?php echo $result['nsort']?>" name="nsort" id="exampleInputPassword3" placeholder="请输入数字排序">
    </div>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <button type="submit" class="btn btn-info">提交</button>
</form>
</body>
</html>
