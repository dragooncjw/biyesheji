<?php
include("conn.php");


$username = $_POST['username'];
$password = $_POST['password'];

if($username==""||$password==""){
?>
  <html>
    <script>alert('用户名或密码不能为空');
    window.location="login.html";</script>
    </html>
<?php
exit;
}
else{
  	$strsql="select * from `users` where username='$username'";
	$strsql1="select * from `todos`";
//	$strsql2="update `users` set state='on' where username='$username'";//record online or offline
	$result = mysql_db_query($mysql_database, $strsql, $conn);
	$result1=mysql_db_query($mysql_database,$strsql1,$conn);
//	$result2=mysql_db_query($mysql_database,$strsql2,$conn);
	@$row = mysql_fetch_array($result);
	$num=-1;
	while(@$row1=mysql_fetch_array($result1)){
		$num++;
		$arr[$num]['disc']=$row1['disc'];
	}

  if($row['username']==$username&&$row['password']==$password)
  {
    // 回话保存
    $user['username']=$username;
    $user['name']=$row['name'];
    $user['ifnew']=$row['ifnew'];
	$_SESSION['user']=$user;
	$_SESSION['todos']=$arr;
//	print_r($arr);
	header('Location:index.php');
  }else{
    ?>
		<html>
		<script>alert('身份核对有误，请重新输入');
			window.location = "login.html";</script>
		</html><?php
		exit;
  }
}
?>