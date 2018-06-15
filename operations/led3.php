<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/4/14
 * Time: 下午8:58
 */

$signal=$_GET['signal'];
$text=file_get_contents('../instruction.txt');
if($signal) {
    $text[0]=1;
    $text[4] = 1;
}
else{
    $text[0]=1;
    $text[4]=0;
}
file_put_contents('../instruction.txt', $text);
$status=substr($text,2);
$string='Location:../operation.php?status='.$status;
header($string);