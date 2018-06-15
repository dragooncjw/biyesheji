<?php
include("conn.php");
if($_SESSION['user']['ifnew']==0) {
    $username = $_SESSION['user']['username'];
    $strsql = "update `users` set ifnew='1' where username='$username'";
    $result = mysql_db_query($mysql_database, $strsql, $conn);
    $_SESSION['user']['ifnew'] = 1;
}
?>