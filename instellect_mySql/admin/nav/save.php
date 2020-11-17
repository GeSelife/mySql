<?php
include_once '../../lib/db.php';

//前台数据
$data=$_POST;
//var_dump($data);
//循环遍历 拼接 keys
//判断当前的keys对应的values值是否为真   真->直接拼接 假->跳过
//value 判断key
$sql="insert into nav (";
foreach ($data as $key=>$value){
    if($value){
        $sql .= "$key,";
    }
}
$sql=substr($sql,0,-1);
$sql .= ") values (";
foreach ($data as $key=>$value){
    $value && ($sql .= "'$value',");
}
$sql = substr($sql,0,-1).")";



//插入
$mysql->query($sql);
//判断影响的行
if($mysql->affected_rows > 0){
    $url = "./index.php";
    $scene = "panel-success";
    $msg = "导航添加成功";
}else{
    $url = "./add.php";
    $scene = "panel-danger";
    $msg = "导航添加失败";
}

include_once "../alert.html";