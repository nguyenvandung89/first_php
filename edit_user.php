<?php
  $conn = mysql_connect("localhost", "root", "") or die("can’t connect database");
  mysql_select_db("test1_mysql", $conn);
?>
<?php
  $id = $_GET['userid'];
  if(isset($_POST['ok']))
  {
    if($_POST['username'] == null)
    {
      echo "please input username";
    }
    else
    {
      $u = $_POST['username'];
    }
    if($_POST['password'] != $_POST['repass'])
    {
      echo "password not correct re-password";
    }
    else
    {
      if($_POST['password'] != null)
      {
        $p = $_POST['password'];
      }
    }
    if($u && $p)
    {
      $sql = "update user set username='".$u."', password='".$p."' where id='".$id."'";
      mysql_query($sql);
      header("location: list.php");
      exit();
    }
    else
    {
      if($u)
      {
        $sql = "update user set username='".$u."' where id='".$id."'";
        mysql_query($sql);
        header("location: list.php");
        exit();
      }
    }
  }
  $sql = "select * from user where id='".$id."'";
  $query = mysql_query($sql);
  if(mysql_num_rows($query) == 0)
  {
    echo "User khong ton tai<br>";
  }
  else
  {
    $row = mysql_fetch_array($query);
  }
?>
<? if($row){ ?>
  <form action="edit_user.php?userid=<?=$id?>" method=post>
  Username: <input type=text name="username" value="<?=$row[username]?>" size="30"><br>
  Password: <input type=password name="password" size="30"><br>
  Re-Password: <input type=password name="repass" size="30"><br>
  <input type=submit name="ok" value="Update">
<? } ?>
