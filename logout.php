<?php
include ("conn.php");
header("Content-Type:text/html;charset=utf-8");
$username=$_SESSION['user']['username'];
//$strsql="update `users` set state='off' where username='$username'";
//$result = mysql_db_query($mysql_database, $strsql, $conn);
//if($result!=1){
//	?>
<!--	<html>-->
<!--	<script>alert('登出失败');</script>-->
<!--	</html>--><?php
//	exit;
//}
if(!isset($_SESSION)) { session_start(); }
unset($_SESSION['user']);
unset($_SESSION['todos']);

session_destroy();
?>
<html>
<script>alert('登出成功');window.location="login.html";</script>
</html>