<?php

$host = 'localhost'; //url 不要加端口，要单独指定。 

$user = "root";

$passwd = "root";

$database = "test";

$port = "3306"; //默认端口号3306，可省略。若省略，连接数据库那也去掉端口号。

//1.创建MySQLi对象，连接数据库===========================

$mysqli = new MySQLi($host, $user, $passwd, $database, $port); //连接数据库

//$mysqli->select_db($database); 可以按这样单独设置要操作的数据库，上面的数据库可省略。

//或者这样也可以

//$mysqli = mysqli_connect($host,$user,$passwd,$database,$port); //连接数据库

if ($mysqli->connect_error) {

    die("连接失败" . $mysqli->connect_error);
}

//2.设置操作编码===========================

$mysqli->set_charset('utf8'); //设置查询结果编码

//3.操作数据库（发送sql&处理结果）=================

$sql = "select * from t_user";

$res = $mysqli->query($sql);

//处理结果

while ($row = $res->fetch_assoc()) { //遍历结果

    print_r($row);

    echo "<br/>";
}

//4.关闭资源，连接  ==========================

$res->free();

$mysqli->close(); //关闭连接