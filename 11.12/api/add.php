<?php
# 引入另一个文件
include_once './public.php';

$data = $_POST;
$id = $data['id'];
unset($data['id']);
//验证请求规则
//var_dump($_SERVER);
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo '请求方式错误';
    exit();
}

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

$mysql->query($sql);
$result = $mysql -> affected_rows;

if($result){
    echo json_encode([
        'code'=>1,
        'msg'=>'数据添加成功',
        'data'=>$result
    ]);
}else{
    echo json_encode([
        'code'=>0,
        'msg'=>'数据添加失败',
        'data'=>[]
    ]);
}
