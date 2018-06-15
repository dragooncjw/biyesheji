<?php
//登录验证
include ('conn.php');
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
$username=$user['username'];
$strsql="select name from `users`";
$result = mysql_db_query($mysql_database, $strsql, $conn);

$strsql1="select * from `messages`";
$result1 = mysql_db_query($mysql_database, $strsql1, $conn);
$num=-1;
while(@$row1=mysql_fetch_array($result1))
{
    if($row1['receiver']==$user['name'])
    {
        $num++;
        $un=$row1['sender'];
        $strsql2="select name from `users` where username='$un'";
        $result2=mysql_db_query($mysql_database, $strsql2, $conn);
        @$row2=mysql_fetch_array($result2);

        @$mess[$num]['level']=$row1['level'];
        @$mess[$num]['disc']=$row1['disc'];
        @$mess[$num]['sender']=$row2['name'];
        @$mess[$num]['time']=$row1['time'];
    }
}

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
<link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
<link rel="stylesheet" href="js/intro/introjs.css" type="text/css" cache="false" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
</head>
<body>

<section class="vbox">
  <header class="bg-dark dk header navbar navbar-fixed-top-xs">
    <div class="navbar-header aside-md"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="images/logo.png" class="m-r-sm">温控和电器组开关控制系统</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a> </div>
    <ul class="nav navbar-nav hidden-xs">
      <li class="dropdown"> <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"> <i class="fa fa-building-o"></i> <span class="font-bold">Personal Info</span> </a>
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
          <li class="divider"></li>
          <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch"> <!-- .aside -->
		<aside class="bg-dark lter nav-xs aside-md hidden-print" id="nav">
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
								<li > <a href="index.php"> <i class="fa fa-home"> <b class="bg-danger"></b> </i> <span>Workset</span> </a> </li>
                                <li > <a href="operation.php" > <i class="fa fa-columns icon"> <b class="bg-warning"></b> </i> <!--<span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span>--> <span>Operation</span> </a>
                                    <!--                    <ul class="nav lt">-->
                                    <!--                      <li > <a href="operation.php" > <i class="fa fa-angle-right"></i> <span>Temperature control</span> </a> </li>-->
                                    <!--                      <li > <a href="layout-r.html" > <i class="fa fa-angle-right"></i> <span>Electrical unit control</span> </a> </li>-->
                                    <!--                    </ul>-->
                                </li>
								<li > <a href="charts.php" >  <i class="fa fa-file-text icon"> <b class="bg-primary"></b> </i><span class="pull-right"></span> <span>Charts</span> </a></li>
								<li > <a href="shutdown.php" > <i class="fa fa-flask icon"> <b class="bg-success"></b> </i>  <span class="pull-right"> </span> <span>Emergency</span> </a></li>
								<li class="active"> <a href="message.php" class="active"><i class="fa fa-envelope-o icon"> <b class="bg-primary dker"></b> </i> <span>Message</span> </a> </li>
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
					<a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-right text-active"></i> </a>
				</footer>
			</section>
		</aside>

      <!-- /.aside -->
      <section id="content">
        <section class="hbox stretch"> <!-- .aside -->
          <aside class="aside aside-md bg-white">
            <section class="vbox">
              <header class="dk header">
                <p class="h4">Mailbox</p>
              </header>
              <section id="select_level" style="height:400px;">
                <section>
                  <section id="mail-nav" class="hidden-xs">
                    <ul class="nav nav-pills nav-stacked no-radius m-t-sm">
                      <li> <a href="#" id="a1" onclick="if($('#i1').is(':hidden')){$('#i2').hide();$('#i3').hide();$('#i1').show();setLevel($('#a1').text()+'1');}else {$('#i1').hide();setLevel($('#a1').text()+'0');}"> <i class="fa fa-circle text-danger pull-right m-t-xs"></i><i id="i1" class="fa fa-check"></i> Emergency </a> </li>
                      <li> <a href="#" id="a2" onclick="if($('#i2').is(':hidden')){$('#i1').hide();$('#i3').hide();$('#i2').show();setLevel($('#a2').text()+'1');}else {$('#i2').hide();setLevel($('#a2').text()+'0');}"> <i class="fa fa-circle pull-right m-t-xs"></i><i id="i2" class="fa fa-check"></i> Normal </a> </li>
                      <li> <a href="#" id="a3" onclick="if($('#i3').is(':hidden')){$('#i2').hide();$('#i1').hide();$('#i3').show();setLevel($('#a3').text()+'1');}else {$('#i3').hide();setLevel($('#a3').text()+'0');}"> <i class="fa fa-circle text-success pull-right m-t-xs"></i><i id="i3" class="fa fa-check"></i> Easy </a> </li>
                    </ul>
                  </section>
                </section>
              </section>
            </section>
          </aside>
          <!-- /.aside --> <!-- .aside -->
          <aside class="bg-light lter b-l" id="email-list">
            <section class="vbox">
              <header class="bg-light dk header clearfix">
                <div class="btn-toolbar">
                  <!--<div class="btn-group select">
                    <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> <span class="dropdown-label" style="width: 65px;" id="text">Level</span> <span class="caret"></span> </button>
                    <ul class="dropdown-menu text-left text-sm" id="levelul">
                      <li><a href="#">Emergency</a></li>
                      <li><a href="#">Normal</a></li>
                      <li><a href="#">Easy</a></li>
                    </ul>
                  </div>-->
                  <div class="btn-group">
                    <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" data-title="Refresh" onclick="location.reload();"><i class="fa fa-refresh"></i></button>
                  </div>
                </div>
              </header>
              <section class="scrollable hover" id="scrollable_hover" style="height:400px;">
                <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-alt list-group-lg">
                    <?php

                    for($j=count(@$mess)-1;$j>=0;$j--){//format by time
                        if(substr(@$mess[$j]['time'],0,10)==date("Y-m-d",time())){
                            $mestime=substr(@$mess[$j]['time'],11,8);}
                            else{$mestime=substr(@$mess[$j]['time'],0,10);}
                        if(trim($mess[$j]['level'])=="Normal"){
                            echo '<!--normal--><li class="list-group-item"> <a href="#" class="thumb-xs pull-left m-r-sm"> <img src="images/avatar_default.jpg" class="img-circle"> </a> <a href="#" class="clear"> <small class="pull-right text-muted">'.$mestime.'</small> <strong>'.@$mess[$j]['sender'].'</strong> <span class="label label-sm bg-primary1 text-uc">normal</span> <span>'.@$mess[$j]['disc'].'</span> </a> </li>';
                        } else if(trim($mess[$j]['level'])=="Emergency"){
                            echo '<!--emergency--><li class="list-group-item"> <a href="#" class="thumb-xs pull-left m-r-sm"> <img src="images/avatar_default.jpg" class="img-circle"> </a> <a href="#" class="clear"> <small class="pull-right text-muted">'.$mestime.'</small> <strong>'.@$mess[$j]['sender'].'</strong> <span class="label label-sm bg-danger text-uc">emergency</span> <span>'.@$mess[$j]['disc'].'</span> </a> </li>';
                        } else if(trim($mess[$j]['level'])=="Easy"){
                            echo '<!--easy--><li class="list-group-item"> <a href="#" class="thumb-xs pull-left m-r-sm"> <img src="images/avatar_default.jpg" class="img-circle"> </a> <a href="#" class="clear"> <small class="pull-right text-muted">'.$mestime.'</small> <strong>'.@$mess[$j]['sender'].'</strong> <span class="label label-sm bg-success text-uc">easy</span> <span>'.@$mess[$j]['disc'].'</span> </a> </li>';
                        }
                    }?>
                </ul>
              </section>
              <footer class="footer b-t bg-white-only">
                <form class="m-t-sm" action="sendMessage.php" method="post" id="myform">
                    <input type="hidden" name="mylevel" id="mylevel"/>
                    <input type="hidden" name="mydisc" id="mydisc"/>
                    <input type="hidden" name="myreceiver" id="myreceiver"/>
                    <div class="input-group">
                        <input type="text" class="input-sm form-control input-s-sm" id="messagedisc" placeholder="Messagedisc">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default btn-sm" onclick="sendM();">Submit</button>
                            </div>
                    </div>
                </form>
              </footer>
            </section>
          </aside>
          <aside class="aside-sm b-l">
            <section class="vbox">
              <header class="bg-light dk header">
                <p>Send to</p>
              </header>
              <section class="scrollable bg-white" id="send_to" style="height:300px;">
                  <div class="list-group list-group-alt no-radius no-borders">
                  <?php
                  $num=0;
                    while(@$row = mysql_fetch_array($result)){
                        $num++;
                        if($row['name']==$user['name'])
                            continue;
                        ?>
                      <a class="list-group-item" href="#" id="<?php echo $num;?>" onclick="if($('#myi<?php echo $num;?>').is(':hidden')){$('#myi<?php echo $num;?>').show();setUser($('#<?php echo $num?> span').text()+'1');}else {$('#myi<?php echo $num;?>').hide();setUser($('#<?php echo $num?> span').text()+'0');}">
						<span><?php
                        echo $row['name'];
                            ?></span>
                          <i id="myi<?php echo $num;?>" class="fa fa-check"></i>
                      </a>
                  <?php
                    }
                  ?>
                  </div>
              </section>
            </section>
          </aside>
        </section>
    </section>
  </section>
</section>
</section>
<script src="js/app.v2.js"></script> <!-- Bootstrap --> <!-- App -->
<script src="js/messages.js"></script>
<script>
//  level下拉框替换
  $('#levelul').on('click', function(e) {
    var $target = $(e.target);
//    $('#level').find('span').text($target);
    $target.is('li a') && $('#text').text($target.text())
  })</script>
    <script>
        $('.fa.fa-check').hide();
    </script>
<!--<script>-->
<!--	function Submit(){-->
<!--		if(event.keyCode==13){-->
<!--//			提交，submit-->
<!--            sendM();-->
<!--//			这里写进行提交的ajax方法-->
<!--		}-->
<!--	}-->
<!--</script>-->
<script src="js/intro_message.js" cache="false"></script>
<script src="js/intro/intro.min.js"></script>
</body>
</html>
