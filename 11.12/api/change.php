<?php
include_once './public.php';

$data = $_GET;
$id = $data['id'];
unset($data['id']);
//判断是否被设置过
if(!isset($get) || empty($get)){
    echo 'id不能为空';
    exit();
}

$sql = "SELECT * FROM teacher WHERE id=$get";

$result = $mysql->query($sql)->fetch_assoc();
$mysql->close();

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