<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/3/4
 * Time: 下午12:20
 */

include("conn.php");

$level=$_POST['mylevel'];
$disc=$_POST['mydisc'];
$receiver=$_POST['myreceiver'];
$sender=$_SESSION['user']['username'];
$arr=split(',',$receiver);
for($i=0;$i<count($arr);$i++)
{
    $rece=$arr[$i];
    $strsql="insert into `messages`(`level`,`sender`,`receiver`,`disc`) VALUES ('$level','$sender','$rece','$disc')";
    $result = mysql_db_query($mysql_database, $strsql, $conn);
}

if(!$result)
{
    ?>
    <html>
    <script>alert('信息发送失败');
        window.location = "message.php";</script>
    </html><?php
    exit;
}else{
    ?>
    <html>
    <script>alert('信息发送成功');
        window.location = "message.php";</script>
    </html><?php
    exit;
}
?>