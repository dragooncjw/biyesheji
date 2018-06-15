<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/4/27
 * Time: 下午3:57
 */


$nian=$_GET['nian'];
$yue=$_GET['yue'];
$ri=$_GET['ri'];
$shi=$_GET['shi'];
$fen=$_GET['fen'];
$miao=$_GET['miao'];
$time=$nian."-".$yue."-".$ri." ".$shi.":".$fen.":".$miao;
include ('conn.php');
$strsql="insert into `timing`(time) values ('$time')";
$result = mysql_db_query($mysql_database, $strsql, $conn);
if($result) {
    ?>

    <html>
    <script>alert('定时成功！');
        window.location = "operation.php";</script>
    </html>
    <?php
}else{
    ?>
    <html>
    <script>alert('定时失败！');
        window.location = "operation.php";</script>
    </html>
<?php
}



//include ('conn.php');
////ignore_user_abort(true);//无论客户端是否关闭浏览器，下面的代码都执行
////set_time_limit(0);//取消php文件执行时间（默认30s）
////header("Location:index.php");
//$strsql="select * from `timing` order by `id` desc";
//$result = mysql_db_query($mysql_database, $strsql, $conn);
//@$row = mysql_fetch_array($result);//取出最新一条记录
//
//date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
//$showtime=date("Y-m-d H:i:s");
//if($row['time']===$showtime){
//    $text=file_get_contents('./instruction.txt');
//
//    $text[0]=1;
//    $text[2]=0;
//    $text[3]=0;
//    $text[4]=0;
//    $text[5]=0;
//
//    file_put_contents('./instruction.txt', $text);
//}


?>