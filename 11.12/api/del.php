<?php

include_once 'public.php';
$id=$_POST['id'];

$sql = "DELETE FROM teacher WHERE id=$id";
$mysql->query($sql);
$result = $mysql->affected_rows;

if($result==1){
    //转换成json对象的字符串
    echo json_encode([
        'code'=>1,
        'msg'=>'删除成功',
        'data'=>$result
    ]);

}else{
    //转换成json对象的字符串
    echo json_encode([
        'code'=>0,
        'msg'=>'删除失败',
        'data'=>[]
    ]);

}



