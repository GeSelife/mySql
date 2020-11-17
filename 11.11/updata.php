<?php
/*
 * 更新数据
 * 修改那条数据
 * 修改的内容
 *
 */

include_once './public.php';
$data = $_POST;
//var_dump($data);
//碰到id跳过
$id = $data['id'];
unset($data['id']);
//
//$mysql = new mysqli('localhost','root','','wuif2008','3306');
//if($mysql->connect_errno){
//    echo '数据库连接失败，失败原因' .$mysql->connect_errno;
//    exit();
//}
//
//$mysql->query("set names utf8");

$sql = "UPDATE teacher set ";
foreach ($data as $key=>$value){
    $sql .= "$key='$value'," ;
}
$sql = substr($sql,0,-1);
$sql .= " WHERE id=$id";
//var_dump($data);

$mysql->query($sql);
$result = $mysql -> affected_rows;
var_dump($data);

if($result){
    echo "success";
}else{
    echo "failed";
}




