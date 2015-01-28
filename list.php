<?php
  $conn = mysql_connect("localhost", "root", "") or die("can’t connect database");
  mysql_select_db("test1_mysql", $conn);
?>
<h2 align='center'>DANH SACH USER</h2></br>
<table align='center' width='500' border='1'>
  <tr>
    <td>STT</td>
    <td>Username</td>
    <td>Edit</td>
    <td>Del</td>
  </tr>
<?php
  $sql = "select * from user";
  $query = mysql_query($sql);
  if (mysql_num_rows($query) == 0)
  {
    echo "<tr><td colspan=5 align=center>Chua co username nao</td></tr>";
  }
  else
  {
    while ($row = mysql_fetch_array($query))
     {
       $stt++;
       echo "<tr>";
       echo "<td>$stt</td>";
       echo "<td>$row[username]</td>";
       echo "<td><a href='edit_user.php?userid=$row[id]'>Edit</a></td>";
       echo "<td><a href='del_user.php?userid=$row[id]'>Del</a></td>";
       echo "</tr>";
     }
  }
  mysql_close($conn);
  echo "</table>";
?>
