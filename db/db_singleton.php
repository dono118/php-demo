<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DATABASE", "test");

class Db
{
    public $conn;
    static $db;

    static function instance()
    {
        if (self::$db == null) {
            self::$db = new self;
        }
        return self::$db;
    }

    // 禁止clone
    final private function __clone()
    {
    }

    // 私有化构造器,禁止外部new
    final private function __construct()
    {
        $conn = mysqli_connect(HOST, USER, PASSWORD);
        if (!$conn) {
            echo "数据库连接失败!";
            die;
        }

        mysqli_select_db($conn, DATABASE);
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

$db = Db::instance();
// $db1 = Db::instance();
// if ($db === $db1) {
//     echo "是同一个对象";
// } else {
//     echo "不是同一个对象";
// }
$arr = $db->select("select * from t_user");
print_r($arr);
