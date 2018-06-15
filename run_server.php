<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/5/1
 * Time: 下午1:25
 */

//以下代码不运行在系统中，而是服务器单独运行在后台中
//用于后台定时功能实现，将数据库timing表最后一条数据与当前时间进行对比，如果相等就关闭系统。
include ('conn.php');
ignore_user_abort(true);//无论客户端是否关闭浏览器，下面的代码都执行
set_time_limit(0);//取消php文件执行时间（默认30s）
//header("Location:index.php");
$strsql="select * from `timing` order by `id` desc";
$result = mysql_db_query($mysql_database, $strsql, $conn);
@$row = mysql_fetch_array($result);//取出最新一条记录

date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
$showtime=date("Y-m-d H:i:s");
if($row['time']===$showtime){
    $text=file_get_contents('./instruction.txt');

    $text[0]=1;
    $text[2]=0;
    $text[3]=0;
    $text[4]=0;
    $text[5]=0;

    file_put_contents('./instruction.txt', $text);
}