<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/5/1
 * Time: 下午1:49
 */

include('conn.php');

$strsql="select `time` from `timing` order by `id` desc limit 1";
$result = mysql_db_query($mysql_database, $strsql, $conn);
@$row=mysql_fetch_array($result);
date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
$showtime=date("Y-m-d H:i:s");

if($row[0]<$showtime){
    ?>
    <html>
    <script>alert('没有正在进行的定时任务');
        window.location = "operation.php";</script>
    </html>
    <?php
}
else{
    $strsql2="delete from `timing` order by `id` desc limit 1";
    $result2 = mysql_db_query($mysql_database, $strsql2, $conn);
    ?>
    <html>
    <script>alert('删除任务成功');
        window.location = "operation.php";</script>
    </html>
    <?php
}
