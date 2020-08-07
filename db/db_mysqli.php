<?php

class Db
{
    public $conn;
    function __construct($table)
    {
        $conn = mysqli_connect("localhost", "root", "root");
        if (!$conn) {
            echo "数据库连接失败!";
            die;
        }

        mysqli_select_db($conn, $table);
        mysqli_query($conn, "set names utf8");
        $this->conn = $conn;
    }

    function select($sql)
    {
        $rst = mysqli_query($this->conn, $sql);
        $arr = array();
        while ($rs = mysqli_fetch_assoc($rst)) {
            $arr[] = $rs;
        }
        return $arr;
    }

    function __destruct()
    {
        mysqli_close($this->conn);
    }
}

$db = new Db("test");
$arr = $db->select("select * from t_user");
print_r($arr);
