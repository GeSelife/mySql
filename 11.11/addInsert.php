<?php
# 引入另一个文件
include_once './public.php';
//验证请求规则
//var_dump($_SERVER);
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo '请求方式错误';
    exit();
}
$data = $_POST;

$sql ="INSERT INTO teacher (";

foreach ($data as $key=>$value){
    $sql .= "$key,";
}
$sql = substr($sql,0,-1);
$sql .=') VALUES (';
foreach ($data as $key=>$value){
    $sql .= "'$value',";
}
$sql = substr($sql,0,-1);
$sql .=')';

//var_dump($sql);

$mysql->query($sql);
$result = $mysql -> affected_rows;

if($result){
    include_once './alert.html';
}else{
    echo "failed";
}