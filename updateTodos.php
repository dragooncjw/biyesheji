<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 16:19
 */

include ("conn.php");

$disc=$_GET['disc'];
$sql="insert into `todos`(disc) values('$disc') ";
$result = mysql_query($sql);
while($row=mysql_fetch_row($result))
{
	echo $row[1];
}
$todos=$_SESSION['todos'];
$todos[count($todos)]['disc']=$disc;


$_SESSION['todos']=$todos;

?>