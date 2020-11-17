<?php
include_once './public.php';

$sql = "SELECT * FROM teacher GROUP BY id ASC";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);


$mysql->close();

//var_dump($result);//不是json格式 只是查看数据的值

if($result){
    $arr = [
        'code'=>1,
        'msg'=>'数据获取成功',
        'data'=>$result
    ];
    //转换成json对象的字符串
    echo json_encode($arr);

}else{
    $arr = [
        'code'=>0,
        'msg'=>'数据获取失败',
        'data'=>[]
    ];
    //转换成json对象的字符串
    echo json_encode($arr);

}