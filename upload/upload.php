<form action="" method="POST" enctype="multipart/form-data" id="form1">
  <input type="file" name="tt">
  <input type="submit" name="sub" value="提交">
</form>
<?php
if (@$_POST['sub']) {
  print_r($_FILES['tt']);
  $name = $_FILES['tt']['name'];
  $file_tmp = $_FILES['tt']['tmp_name'];
  $dir = "ss/";

  $error = $_FILES['tt']['error'];
  if ($error > 0) {
    echo "上传失败!";
    exit;
  }
  //判断文件的类型
  $arr = explode(".", $name);
  //$arr[count($arr) - 1]的值就是文件的扩展名
  $ext_name = $arr[count($arr) - 1];
  $types = array("jpg", "png", "gif");
  if (!in_array($ext_name, $types)) {
    echo "上传失败! 仅支持jpg,png,gif";
    exit;
  }
  $mtime = explode(' ', microtime());
  $namet = ($mtime[1] + $mtime[0]) * 10000;
  $name = $namet . '.' . $ext_name;

  if (move_uploaded_file($file_tmp, $dir . $name)) {
    echo "上传成功!";
    exit;
  } else {
    echo "上传失败!";
  }
}
