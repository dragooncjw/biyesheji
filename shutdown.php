<?php



$text=file_get_contents('./instruction.txt');

$text[0]=1;
$text[2]=0;
$text[3]=0;
$text[4]=0;
$text[5]=0;


file_put_contents('./instruction.txt', $text);
include ("conn.php");
$strsql="select `time` from `timing` order by `id` desc limit 1";
$result = mysql_db_query($mysql_database, $strsql, $conn);
@$row=mysql_fetch_array($result);
date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
$showtime=date("Y-m-d H:i:s");
if($row[0]<$showtime){
    ?>
    <html>
    <script>alert('shut down the system successfully!');
        window.location="index.php";</script>
    </html>
    <?php
}
else{
    $strsql2="delete from `timing` order by `id` desc limit 1";
    $result2 = mysql_db_query($mysql_database, $strsql2, $conn);
    ?>
    <html>
    <script>alert('shut down the system successfully!');
        window.location="index.php";</script>
    </html>
    <?php
}


