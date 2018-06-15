<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/4/13
 * Time: 下午10:00
 */

include('conn.php');
$strsql="select * from `temperature` order by `id` desc limit 300";
$result=mysql_db_query($mysql_database, $strsql, $conn);

$num=0;
while(@$row=mysql_fetch_array($result)){
    if($row['temperature']>=85)//错误温度数据
        continue;
    $arr[$num]['temperature']=$row['temperature'];
//    $arr[$num]['time']=$row['time'];
    $num++;
}
$arr=array_reverse($arr);//数组反转，时间顺序排序

echo json_encode($arr);