<?php

class Db
{
    public $conn;
    function __construct()
    {
        $conn = mysqli_connect("localhost", "root", "root");
        if (!$conn) {
            echo "数据库连接失败!";
            die;
        }

        mysqli_select_db($conn, "test");
        mysqli_query($conn, "set names utf8");
        $this->conn = $conn;
    }

    // 查询
    function select($sql)
    {
        $rst = mysqli_query($this->conn, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_assoc($rst)) {
            $arr[] = $rs;
        }
        return $arr;
    }

    // 增加
    function add($table, $arr)
    {
        $str = $this->arrToStr($arr);
        $sql = "insert into " . $table . " set " . $str;
        // echo $sql;
        // die;
        return mysqli_query($this->conn, $sql);
    }

    // 修改
    function update($table, $arr, $clauz)
    {
        $str = $this->arrToStr($arr);
        $sql = "update " . $table . " set " . $str . " " . $clauz;
        return mysqli_query($this->conn, $sql);
    }

    // 删除
    function delete($table, $clauz)
    {
        $sql = "delete from " . $table . " " . $clauz;
        return mysqli_query($this->conn, $sql);
    }

    // 数组转字符串
    // 把数组 array("username" => "lisi", "password" => "123456") 转成 
    // 字符串 username='lisi',password='123456' 的形式
    function arrToStr($arr)
    {
        $arr1 = array();
        foreach ($arr as $k => $v) {
            $arr1[] = $k . "='" . $v . "'";
        }
        $str = implode(',', $arr1);
        return $str;
    }

    // 增加,删除,修改统一方法
    function execute($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    function __destruct()
    {
        if ($this->conn != null) {
            mysqli_close($this->conn);
        }
    }
}

$db = new Db();
// $arr = $db->select("select * from t_user");
// print_r($arr);
// $bool = $db->execute("insert into t_user set username='zhangsan',password='123456'");
// $bool = $db->add("t_user", array("username" => "lisi", "password" => "123456"));
// $bool = $db->update("t_user", array("password" => "654321"), "where id=15");
$bool = $db->delete("t_user", "where id >= 10");
var_dump($bool);
