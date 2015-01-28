<?php
  $conn = mysql_connect("localhost", "root", "") or die("can’t connect database");
  mysql_select_db("test1_mysql", $conn);
  $id = $_GET['userid'];
  $sql = "delete from user where id='".$id."'";
  mysql_query($sql);
  echo "xoa thanh cong";
  header("location: list.php");
  exit();
?>

