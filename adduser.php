<?php
if(isset($_POST['create_user']))
{
  $u=$p="";
  if($_POST['username'] == null)
  {
    echo "please input username";
  }
  else
  {
    $u = $_POST['username'];
  }
  if($_POST['password'] == null)
  {
    echo "please input password";
  }
  else
  {
    $p = $_POST['password'];
  }
  if($u && $p)
  {
    $conn = mysql_connect("localhost", "root", "") or die("can't accept");
    mysql_select_db("test1_mysql", $conn);
    $sql = "select * from user where username='".$u."'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) > 0)
    {
      echo "user da ton tai";
    }
    else
    {
      $sql_adduser = "insert into user(username, password) values('".$u."', '".$p."')";
      mysql_query($sql_adduser);
      echo "them moi thanh cong<br><br>";
      echo "Danh sach user<br><br>";
      $list_user = "select * from user";
      $query = mysql_query($list_user);
      while ($row = mysql_fetch_array($query))
      {
        echo $row[username]."-".$row[password]."<br>";
      }
    }
  }
}
?>
