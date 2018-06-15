<?php
header("Content-Type:text/html;charset=utf-8");
$time=$_GET['time'];
$title=$_GET['title'];
$disc=$_GET['disc'];

if($title==''){
	?>
	<html>
	<script>alert('标题不能为空');
		window.location = "index.php";</script>
	</html><?php
	exit;
}
$year=substr($time,6,4);
$month=substr($time,3,2);
$day=substr($time,0,2);
$month=ltrim($month, "0");
$day=ltrim($day,"0");
if($year==''||$month==''||$day==''){
	?>
	<html>
	<script>alert('年月日不能有空');
		window.location = "index.php";</script>
	</html><?php
	exit;
}
//生成随机颜色
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

//echo $time;
//echo $title;
//echo $disc;
//echo '<br />';
//echo $year.' '.$month.' '.$day;
//echo '<br />';
//echo $color;
//echo '<br />';
//echo count(date($time));

$origin_str = file_get_contents('js/calendar.js');
$update_str = str_replace('events = [];', 'events = [];events.push(
	[
		"'.$day.'/"+"'.$month.'/"+"'.$year.'",
        "'.$title.'",
        "#",
        "'.$color.'",
        "'.$disc.'"
     ]);', $origin_str);
file_put_contents('js/calendar.js', $update_str);
header('Cache-Control:no-cache,must-revalidate');
header('Pragma:no-cache');
header('Location:index.php');
//
//$myfile = fopen("js/calendar.js", "r") or die("Unable to open file!");
//$txt =fread($myfile,filesize("js/calendar.js"));
//$txt=$txt."events.push(".
//	"[
//		\"".$day."/\"+\"".$month."\"+\"/\"+\"".$year."\",
//        '".$title."',
//        '#',
//        '".$color."',
//        '".$disc."'
//     ]".
//	");";
//fclose($myfile);
//$myfile=fopen("js/calendar.js","w") or die("Unable to open file!");
//fwrite($myfile, $txt);
//fclose($myfile);
//header('Location:index.php');
?>