<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/4/12
 * Time: 下午2:20
 */

include('conn.php');

$strsql="select * from `temperature` order by `id` desc limit 800";
$result=mysql_db_query($mysql_database, $strsql, $conn);

$num=0;
while(@$row=mysql_fetch_array($result)){
    if($row['temperature']>=30)
        continue;
    $arr[$num]['temperature']=$row['temperature'];
    $arr[$num]['time']=$row['time'];
    $num++;
}
$arr=array_reverse($arr);

echo json_encode($arr);
