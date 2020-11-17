<?php
/*
 * 更新
 *  1.获取前台数据
 */
include_once '../../lib/db1.php';

$config=[
    'username'=>'root',
    'password'=>'',
    'dbname'=>'intellect'
];

$data=$_POST;
$id = $data['id'];
unset($data['id']);

$db= new Db('nav',$config);
$result = $db->updata($data,'id',$id);
//$db->where()->updata();

include_once './index.php';