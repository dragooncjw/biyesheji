<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/4/7
 * Time: 下午1:12
 */

//登录验证
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['user']))
{
    ?>
    <html>
    <script>alert('请先进行登录');window.location="./login.html";</script>
    </html>
    <?php
}
$user=$_SESSION['user'];
$todos=$_SESSION['todos'];
@$status=$_GET['status'];
if(!isset($status)) {
    $status = file_get_contents('./instruction.txt');
    $status=substr($status,2);
}
include ("conn.php");
$strsql="select time from `timing` order by `id` desc limit 1";
$result = mysql_db_query($mysql_database, $strsql, $conn);
$row=mysql_fetch_array($result);
$settime=$row['time'];
$niant=substr($settime,0,4);
$yuet=substr($settime,5,2);
$rit=substr($settime,8,2);
$resttime=substr($settime,10);
$settime=$rit."-".$yuet."-".$niant.$resttime;
//echo $settime;
//echo '<br />';
date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
$nowtime=date("d-m-Y H:i:s");
//echo $nowtime;
if($settime<$nowtime){
    $settime="00-00-0000 00:00:00";
}
//echo '<br />';
//echo $settime;

?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon"/>
    <title>温控和电器组开关控制系统</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v2.css" type="text/css" />
    <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="js/intro/introjs.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="js/slider/slider.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="js/intro/introjs.css" type="text/css" cache="false" />
    <!--[if lt IE 9]><script src="js/ie/html5shiv.js" cache="false"></script><script src="js/ie/respond.min.js" cache="false"></script><script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
</head>
<body>
<section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a>
            <a href="#" class="navbar-brand" data-toggle="fullscreen">
                <img src="images/logo.png" class="m-r-sm">
                温控和电器组开关控制系统
            </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
        </div>
        <ul class="nav navbar-nav hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"> <i class="fa fa-building-o"></i> <span class="font-bold">Personal Info</span> </a>
                <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
                    <div class="wrapper lter m-t-n-xs">
                        <a href="#" class="thumb pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a>
                        <div class="clear">
                            <a href="#"><span class="text-white font-bold">@<?php echo $user['name'];?></span></a>
                            <small class="block">Manager</small>
                        </div>
                    </div>
                </section>
            </li>
            <li>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
            <li class="hidden-xs">
                <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                </a>
                <section class="dropdown-menu aside-xl">
                    <section class="panel bg-white">
                        <header class="panel-heading b-light bg-light">
                            <strong>Click below,you can have introduction</strong>
                        </header>
                        <div class="list-group list-group-alt animated fadeInRight">
                            <a href="#" class="media list-group-item"  onclick="intro();"> <span class="pull-left thumb-sm"> <img src="images/introduction.gif" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use introduction mode<br>
              <small class="text-muted">If you use the system the first time</small> </span> </a>

                            <footer class="panel-footer text-sm"> </footer>
                    </section>
                </section>
            </li>

            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/avatar.jpg"> </span> <?php echo $user['name'];?> <b class="caret"></b> </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <span class="arrow top"></span>
                    <li> <a href="#">Settings</a> </li>
                    <!--          <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li>-->
                    <li class="divider"></li>
                    <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch"> <!-- .aside -->
            <aside class="bg-dark lter aside-md hidden-print" id="nav">
                <section class="vbox">
                    <header class="header bg-primary lter text-center clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-plus"></i></button>
                            <div class="btn-group hidden-nav-xs">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"> Switch Project <span class="caret"></span> </button>
                                <ul class="dropdown-menu text-left">
                                    <li><a href="#">Project</a></li>
                                    <li><a href="#">Another Project</a></li>
                                    <li><a href="#">More Projects</a></li>
                                </ul>
                            </div>
                        </div>
                    </header>
                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333"> <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav">
                                    <li> <a href="index.php"> <i class="fa fa-home"> <b class="bg-danger"></b> </i> <span>Workset</span> </a> </li>
                                    <li > <a href="operation.php" > <i class="fa fa-columns icon"> <b class="bg-warning"></b> </i> <!--<span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span>--> <span>Operation</span> </a>
                                        <!--                    <ul class="nav lt">-->
                                        <!--                      <li > <a href="operation.php" > <i class="fa fa-angle-right"></i> <span>Temperature control</span> </a> </li>-->
                                        <!--                      <li > <a href="layout-r.html" > <i class="fa fa-angle-right"></i> <span>Electrical unit control</span> </a> </li>-->
                                        <!--                    </ul>-->
                                    </li>
                                    <li > <a href="charts.php" >  <i class="fa fa-file-text icon"> <b class="bg-primary"></b> </i><span class="pull-right"></span> <span>Charts</span> </a></li>
                                    <li > <a href="shutdown.php" > <i class="fa fa-flask icon"> <b class="bg-success"></b> </i>  <span class="pull-right"> </span> <span>Emergency</span> </a></li>
                                    <li > <a href="message.php" ><i class="fa fa-envelope-o icon"> <b class="bg-primary dker"></b> </i> <span>Message</span> </a> </li>
                                    <li > <a href="notebook.php" > <i class="fa fa-pencil icon"> <b class="bg-info"></b> </i> <span>Notes</span> </a> </li>
                                </ul>
                            </nav>
                            <!-- / nav --> </div>
                    </section>
                    <footer class="footer lt hidden-xs b-t b-dark">
                        <div id="chat" class="dropup">
                            <section class="dropdown-menu on aside-md m-l-n">
                            </section>
                        </div>
                        <a href="#nav" id="fold" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-right text-active"></i> </a>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->
            <section id="content">
                <section class="vbox">
                    <section class="scrollable padder" id="workset">
                        <div id="temp_control" style="height:150px;">
                        <div class="m-b-md">
                            <h3 class="m-b-none">Temperature Control</h3>
                            <h4 class="m-b-none">(use LEDs as demo)</h4>
                        </div>
                        <div class="form-group" style="margin-left:100px;">
                            <label class="col-sm-2 control-label">Heating Device</label>
                            <div class="col-sm-10">
                                <label class="switch">
                                    <?php if($status[0]==='0'){?>
                                        <input type="checkbox" id="heatd" onclick="lightup('heatd')">
                                    <?php }else{?>
                                        <input type="checkbox" id="heatd" onclick="lightup('heatd')" checked="checked">
                                    <?php }?>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-left:100px;">
                            <label class="col-sm-2 control-label">Cooling Device</label>
                            <div class="col-sm-10">
                                <label class="switch">
                                    <?php if($status[1]==='0'){?>
                                        <input type="checkbox" id="coold" onclick="lightup('coold')">
                                    <?php }else{?>
                                        <input type="checkbox" id="coold" onclick="lightup('coold')" checked="checked">
                                    <?php }?>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        </div>
                        <div id="elec_control" style="height:250px">
                        <div class="m-b-md">
                            <h3 class="m-b-none">Electrical Unit Control</h3>
                            <h4 class="m-b-none">(use LEDs as demo)</h4>
                        </div>
                        <div class="form-group">
                            <div class="led-group" style="margin-left:100px;">
                                <?php if($status[2]==='0'){?>
                                    <img src="images/darkness.png" id="ledimg1"/>
                                <?php }else{?>
                                    <img src="images/lightness.png" id="ledimg1"/>
                                <?php }?>
                                <label style=" float:left;">LED1:</label>
                                <label style="margin-left:48px;" class="switch">
                                    <?php if($status[2]==='0'){?>
                                        <input type="checkbox" id="led1" onclick="lightup('led1')">
                                    <?php }else{?>
                                        <input type="checkbox" id="led1" onclick="lightup('led1')" checked="checked">
                                    <?php }?>
                                    <span></span>
                                </label>
                            </div>

                            <div class="led-group" style="margin-left:100px;">
                                <?php if($status[3]==='0'){?>
                                    <img src="images/darkness.png" id="ledimg2"/>
                                <?php }else{?>
                                    <img src="images/lightness.png" id="ledimg2"/>
                                <?php }?>
                                <label style=" float:left;">LED2:</label>
                                <label style="margin-left:48px;" class="switch">
                                    <?php if($status[3]==='0'){?>
                                        <input type="checkbox" id="led2" onclick="lightup('led2')">
                                    <?php }else{?>
                                        <input type="checkbox" id="led2" onclick="lightup('led2')" checked="checked">
                                    <?php }?>
                                    <span></span>
                                </label>
                            </div>

                        </div>
                        </div>
                        <div id="time_control">
                        <div class="m-b-md" style="width:100%;float:left;display:block;">
                            <h3 class="m-b-none">Timing</h3>
                            <h4 class="m-b-none">Set time to turn off</h4>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Select time to stop</label>
                                    <div class="col-sm-10">
                                        <?php
                                        date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
                                        $nowtime=date("d-m-Y H:i:s"); ?>
                                        <input type="text" id="datetime" class="combodate form-control" data-format="DD-MM-YYYY HH:mm:ss" data-template="D MMM YYYY - HH : mm: ss" name="datetime" value="<?php echo $nowtime;?>">
                                        <a href="#" onclick="timing()" class="btn btn-s-md btn-success">Start timing</a>
                                    </div>
                                    <label class="col-sm-2 control-label">Your time to stop</label>
                                    <div class="col-sm-10">
                                        <input readonly="readonly" type="text" id="datetime1" class="combodate form-control" data-format="DD-MM-YYYY HH:mm:ss" data-template="D MMM YYYY - HH : mm: ss" name="datetime" value="<?php echo $settime;?>">
                                    </div>

                                    <div class="col-sm-10">
                                        <a href="time_cancel.php" class="btn btn-s-md btn-danger">Click to stop timing</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                    </section>
                </section>
            </section>
        </section>
    </section>
    <script src="js/operation.js"></script>
    <script src="js/app.v2.js"></script> <!-- Bootstrap --> <!-- App -->
    <!-- slider -->
    <script src="js/slider/bootstrap-slider.js" cache="false"></script>
    <!-- combodate -->
    <script src="js/libs/moment.min.js" cache="false"></script>
    <script src="js/combodate/combodate.js" cache="false"></script>
    <script src="js/calendar/bootstrap_calendar.js" cache="false"></script>
    <script src="js/intro_mail.js"></script>
    <script src="js/intro/intro.min.js"></script>
</body>
</html>
