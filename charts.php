<?php
/**
 * Created by PhpStorm.
 * User: chenjiawei
 * Date: 2018/3/26
 * Time: 上午9:01
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
//include ('conn.php');
//$strsql="select * from `temperature` order by `id` DESC limit 200";//搜索最新的200条数据。（一秒内获取40条数据，5秒就是200条）
//$result = mysql_db_query($mysql_database, $strsql, $conn);
//@$row = mysql_fetch_array($result);
//$num=0;
//while($row=mysql_fetch_array($result)){
//    $temperature[$num]=$row['temperature'];
//    $time[$num]=$row['time'];
//    $num++;
//}
////print_r($temperature);
////进行demo1.js文件内容更改
//$t=0;
//$origin_str = file_get_contents('js/charts/flot/demo1.js');
//$update_str = str_replace('data=[];', 'data = [];
//for(var i =0;i<'.$num.';i++){
//var now=new Date('.$time[$t++].');
//
//data.push(
//{
//    name:now.toString(),
//    value:[
//        [now.getFullYear(), now.getMonth(), now.getDate()+1].join(\'/\'),
//        '.$temperature[$t++].'
//    ]
//}', $origin_str);
//echo file_put_contents('js/charts/flot/demo1.js', $update_str);



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
                  <li class="active"> <a href="#">  <i class="fa fa-file-text icon"> <b class="bg-primary"></b> </i><span class="pull-right"></span> <span>Charts</span> </a></li>
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
                <section class="scrollable padder">

                    <div class="m-b-md">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="m-b-none m-t-sm">Charts</h3>
                                <small>Real-time data graph & other graph information</small> </div>

                        </div>
                    </div>
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">Real-time data graph</header>
                        <div class="panel-body">
                            <div id="flot-live" style="height:240px"></div>
                        </div>
                    </section>
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">static data graph</header>

                        <div id="static-data" style="height: 500px;">
                        </div>
                        <footer class="panel-footer bg-white">
                            <div class="row text-center no-gutter" id="details_of_data">
                                <div class="col-xs-3 b-r b-light">
                                    <p class="h3 font-bold m-t" id="temp_max">10,450</p>
                                    <p class="text-muted" >Max Temp</p>
                                </div>
                                <div class="col-xs-3 b-r b-light">
                                    <p class="h3 font-bold m-t" id="temp_min">5,860</p>
                                    <p class="text-muted">Min Temp</p>
                                </div>
                                <div class="col-xs-3 b-r b-light">
                                    <p class="h3 font-bold m-t" id="temp_items">300</p>
                                    <p class="text-muted">Items</p>
                                </div>
                                <div class="col-xs-3">
                                    <p class="h3 font-bold m-t" id="temp_diff">3,220</p>
                                    <p class="text-muted">Temp Diff</p>
                                </div>
                            </div>
                        </footer>
                    </section>
                </section>
            </section>
            <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
  </section>
</section>
<script src="js/charts/echarts.common.min.js"></script>
<script src="js/app.v2.js"></script> <!-- Bootstrap --> <!-- App -->
<!--here is the charts's js file-->
<script src="js/charts/flot/jquery.flot.min.js" cache="false"></script>
<script src="js/charts/flot/demo.js" cache="false"></script>
<script src="js/charts/flot/demo1.js"></script>
    <script src="js/intro2.js"></script>
    <script src="js/intro/intro.min.js"></script>
</body>
</html>
