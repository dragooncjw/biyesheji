<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/4/12
 * Time: 下午3:48
 */

include('conn.php');
$strsql="select * from `temperature` order by `id` desc limit 1";
$result=mysql_db_query($mysql_database, $strsql, $conn);


@$row=mysql_fetch_array($result);
$arr['time']=$row['time'];
$arr['temperature']=$row['temperature'];

echo json_encode($arr);
