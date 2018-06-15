<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 16:19
 */

if (!isset($_SESSION)) {
	session_start();
}
header("Content-Type:text/html;charset=utf-8");

@$link = mysql_connect("localhost", "root", "") or die("<script>alert('数据库连接失败，请检查网络');location.href='login.html';</script>");
mysql_select_db("bysj", $link);
//连接腾讯云数据库，先进行网络监测

$mysql_server_name = "localhost";
$mysql_username = "root";
$mysql_password = "";  //need to change so do up
$mysql_database = "bysj";
$conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);

mysql_query("SET NAMES 'utf8'");
?>
