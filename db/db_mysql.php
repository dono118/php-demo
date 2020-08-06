<?php

//建立数据库连接
$conn = mysqli_connect("localhost","root","root");
if(!$conn){
    die("数据库连接失败!");
}
mysqli_select_db($conn,"test");//设置操作的数据库
mysqli_query($conn,"set names utf8");//设置操作编码
//注意:mysqli系统参数,$conn不能省.要求放第一参数.

//编写操作语句
$sql = "SELECT * FROM `t_user`";
//执行操作
$rs = mysqli_query($conn,$sql);//执行后,返回结果是一个结果集(抽象的结果集/值)

$arr = mysqli_fetch_assoc($rs);//把抽象的结果集转换成数组

var_dump($arr);

//关闭连接
mysqli_close($conn);