<?php
include_once '../lib/db.php';

/*
 * 1.接受前台发回来的用户名，密码
 * 2.获取数据库的数据
 *   2.1.获取指定用户名的数据
 *    =>存在
 *    =>不存在
 * 3.对比数据库的数据
 *   3.1.密码
 */
$data = $_POST;
$username = $data['username'];
$password = md5($data['password']);

$sql = "SELECT * FROM admin WHERE username='$username'";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

if($result){
    //存在
    $flag=true;
    for ($i=0,$len=count($result);$i<$len;$i++){
        if($password === $result[$i]['passWord']){
            //成功匹配密码
            $flag=true;
            break;
        }
    }
    if($flag){
        session_start();
        $_SESSION['flag']=true;
        $_SESSION['username']=$data['username'];
        $url ="./main.php";
        $msg ="登录成功";
        $scene ="panel-success";
    }else{
        $url ="./login.php";
        $msg ="用户名和密码不匹配";
        $scene ="panel-danger";
    }
}else{
    //不存在
    $url ="./login.php";
    $msg ="该用户不存在";
    $scene ="panel-danger";
}

include_once 'alert.html';
