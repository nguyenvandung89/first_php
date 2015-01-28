<?php
  if(isset($_POST['ok']))
  {
    $u=$p="";
    if($_POST['username'] == null)
    {
      echo "please input username<br>";
    }
    else
    {
      $u = $_POST['username'];
    }
    if($_POST['password'] == null)
    {
      echo "please input password<br>";
    }
    else
    {
      $p = $_POST['password'];
    }
    if($u && $p)
    {
      $conn =  mysql_connect("localhost", "root", "") or die("can’t connect database");
      mysql_select_db("test1_mysql", $conn);
      $sql = "select * from user where username='".$u."' and password='".$p."'";
      $query = mysql_query($sql);
      if(mysql_num_rows($query) == 0)
      {
        echo "User name or password not correct";
      }
      else
      {
        echo "dang nhap thanh cong";
        $row = mysql_fetch_array($query);
        session_start();
        $_SESSION['userid'] = $row[id];
      }
    }
  }
?>
