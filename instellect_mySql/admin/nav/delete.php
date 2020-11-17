<?php
//include_once '../../lib/db.php';
include_once '../../lib/db1.php';

/*
 * 获取点击的id
 */
$data = $_GET;

if(!isset($data['id']) || empty($data['id'])){
    $url = './index.php';
    $msg = 'id不能为空';
    $scene = 'panel-danger';
    exit();
}

$id = $data['id'];

//$sql = "DELETE FROM nav WHERE id=$id";
//$mysql->query($sql);
//$result = $mysql->affected_rows;

//if($result){
//    echo 'success';
//}else{
//    echo 'failed';
//}

$config=[
    'username'=>'root',
    'password'=>'',
    'dbname'=>'intellect'
];
$db= new Db('nav',$config);
$result = $db->delete('id',$id);

include_once './index.php';