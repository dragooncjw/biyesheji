<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 21:06
 */
include ('conn.php');

$disc=$_GET['disc'];
$todos=$_SESSION['todos'];
$sql="delete from `todos` where disc='$disc'";
$result = mysql_query($sql);
while($row=mysql_fetch_row($result))
{
	echo 'delete successfully';
}
for($i=0;$i<count($todos);$i++){
	if($todos[$i]['disc']!=$disc)
	{
		$arr[$i]['disc']=$todos[$i]['disc'];
	}else{
		$arr[$i]['disc']='';
	}
}
$_SESSION['todos']=$arr;



?>