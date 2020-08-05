<form action="" method="POST" id="form">
  <table width="" border="1" cellpadding="2" cellspacing="0">
    <tr>
      <td width="44">name</td>
      <td width="280"><input type="text" name="name"></td>
    </tr>
    <tr>
      <td>sex</td>
      <td>
        <input type="radio" name="sex" value="男">男
        <input type="radio" name="sex" value="女">女
      </td>
    </tr>
    <tr>
      <td>email</td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td>web</td>
      <td><input type="text" name="web"></td>
    </tr>
    <tr>
      <td>phone</td>
      <td><input type="text" name="phone"></td>
    </tr>
    <tr>
      <td>学历</td>
      <td>
        <select name="xueli">
          <option value="1">本科</option>
          <option value="2">硕士</option>
          <option value="3">博士</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>hobby</td>
      <td>
        体育<input type="checkbox" name="hobby[]" value="体育">
        音乐<input type="checkbox" name="hobby[]" value="音乐">
        编程<input type="checkbox" name="hobby[]" value="编程">
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="reset" name="reset" value="重置">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="sub" value="提交">
      </td>
    </tr>
  </table>
</form>

<a href="#" onclick="document.getElementById('form').submit();">点击提交</a>

<?php
if (@$_REQUEST) {
  print_r($_REQUEST);
  echo count($_REQUEST);
  // die;
  $name = trim(@$_REQUEST['name']);
  $sex  = trim(@$_REQUEST['sex']);
  $email = trim(@$_REQUEST['email']);
  $web = trim(@$_REQUEST['web']);
  $xueli = trim(@$_REQUEST['xueli']);
  $phone = trim(@$_REQUEST['phone']);
  $hobby = @$_REQUEST['hobby'];//不可以这样写trim(@$_REQUEST['hobby']);
  echo "您提交的表单内容如下:<br/>";
  echo "name:".$name."<br/>";
  echo "sex:".$sex."<br/>";
  echo "email:".$email."<br/>";
  echo "web:".$web."<br/>";
  echo "phone:".$phone."<br/>";
  echo "学历:".$xueli."<br/>";
  print_r($hobby);
}
