<?php
//var_dump('删除 ');

include_once 'public.php';

$get=$_GET['id'];
//判断是否被设置过
if(!isset($get) || empty($get)){
    echo 'id不能为空';
    exit();
}
//删除行
$sql ="DELETE FROM teacher WHERE id=$get";

$mysql->query($sql);
$result = $mysql -> affected_rows;

if($result){
    echo 'success';
}else{
    echo "failed";
}

