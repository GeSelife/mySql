<?php
/*
 * 封装类
 *  属性->
 *      mysql 句柄
 *      tablename 表名
 *  方法->
 *      增save、
 *      删delete、
 *      查--->select->多条/find->一条、
 *      更新update
 */
class Db{
    //表名、句柄->私有 只在类里访问  不让外界访问
    private $tablename;
    private $mysql;
    //初始化   $config配置项---标的信息--->主要是传句柄所需要的信息--数据库配置信息
    public function __construct($tablename,$config)
    {
        $this->tablename = $tablename;
        //$config不传参时 域名和端口号设置默认值 其余必传
        $config['host'] = isset($config['host']) && !empty($config['host']) ?$config['host'] : 'localhost';
        $config['port'] = isset($config['port']) && !empty($config['port']) ?$config['port'] : '3306';

        //调用句柄 传入参数
        $this->connect($config);
    }
    //句柄
    private function connect($config){
        $this->mysql=new mysqli($config['host'],$config['username'],$config['password'],$config['dbname'],$config['port']);
        if($this->mysql->connect_errno){
            echo '数据库连接失败，失败原因是' . $this->mysql->connect_errno;
            exit();
        }
        //连接成功 设置字符集
        $this->mysql->query("set names utf8");

    }
    //read 访问一条
    public function read($key,$value){
        $sql = "SELECT * FROM $this->tablename where $key='$value'";
        $result = $this->mysql->query($sql)->fetch_assoc();
        if($result){
            return $result;
        }else{
            return [];
        }
    }
    //delete
    public function delete($key,$value){
        $sql = "DELETE FROM $this->tablename where $key='$value'";
        $result = $this->mysql->query($sql)->fetch_assoc();
        if($result){
            return $result;
        }else{
            return [];
        }
    }
    //更新
    /*
     * $data   Array  必传  要修改的数据
     * $field    string 必传  标识
     * $value  number|string 必传 值/条件
     */
    public function updata($data,$field,$value){
        if(!is_array($data) || empty($data)){
            return '$data不能为空';
        }
        if(!isset($field) || empty($field)){
            return '$field不能为空';
        }
        if(!isset($value) || empty($value)){
            return '$value不能为空';
        }

        $sql = "UPDATE $this->tablename SET ";
        foreach ($data as $key=>$val){
            $sql .= "$key='$val',";
        }
        $sql = substr($sql,0,-1)."WHERE $field='$value'";
        $this->mysql->query($sql);
        return $this->mysql->affected_rows;
    }


}