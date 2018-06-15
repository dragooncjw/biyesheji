<!--address:file:///F:/自学文件/桌面应用程序开发/登录界面/Notebook_admin/index.html-->
<?php
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
include ("conn.php");

$strsql="select time from `timing` order by `id` desc limit 1";
$result = mysql_db_query($mysql_database, $strsql, $conn);
$row=mysql_fetch_array($result);
//echo $row['time'];
date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
$showtime=date("Y-m-d H:i:s");

if($showtime<$row['time']){
    $fen1=substr($row['time'],14,2);
    $fen2=substr($showtime,14,2);
    $miao1=substr($row['time'],17,2);
    $miao2=substr($showtime,17,2);
    $fencha=$fen1-$fen2;
    $miaocha=$miao1-$miao2;
    if($miaocha<0){
        $fencha--;
        $miaocha=$miao1+60-$miao2;
    }
    if($fencha<10){
        $fencha="0".$fencha;
    }
    if($miaocha<10&&$miaocha>=0){
        $miaocha="0".$miaocha;
    }
    $timeleft=$fencha.":".$miaocha;
}else{
    $timeleft="00:00";
}
//echo $timeleft;

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
            <?php if($user['ifnew']==0){
                echo '<span id="ifnew" class="badge badge-sm up bg-danger m-l-n-sm count">new</span>';
            }else{}?>
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
          <li> <a href="settings.php">Settings</a> </li>
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
                  <li class="active"> <a href="#" class="active"> <i class="fa fa-home"> <b class="bg-danger"></b> </i> <span>Workset</span> </a> </li>
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
            <div class="m-b-md">
              <h3 class="m-b-none">Workset</h3>
              <small>Welcome back, <?php echo $user['name'];?></small> </div>
            <section class="panel panel-default">
              <div class="row m-l-none m-r-none bg-light lter">
<!--				  settings-->
                <div class="col-sm-6 col-md-3 padder-v b-r b-light">
					<span class="fa-stack fa-2x pull-left m-r-sm">
						<i class="fa fa-circle fa-stack-2x text-info"></i>
						<i class="fa fa-male fa-stack-1x text-white"></i>
					</span>
					<a class="clear" href="operation.php">
						<span class="h3 block m-t-xs"><strong>Operation</strong></span>
						<small class="text-muted text-uc">Electrical switchgear</small>
					</a>
				</div>

                 <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
					 <span class="fa-stack fa-2x pull-left m-r-sm">
						 <i class="fa fa-circle fa-stack-2x text-warning"></i>
						 <i class="fa fa-bug fa-stack-1x text-white"></i>
					 </span>
					 <a class="clear" href="charts.php">
						 <span class="h3 block m-t-xs"><strong id="bugs">Charts</strong></span>
						 <small class="text-muted text-uc">Temperature graphic</small>
					 </a>
				 </div>
                <div class="col-sm-6 col-md-3 padder-v b-r b-light" id="emergency">
					<span class="fa-stack fa-2x pull-left m-r-sm">
						<i class="fa fa-circle fa-stack-2x text-danger"></i>
						<i class="fa fa-fire-extinguisher fa-stack-1x text-white"></i>
					</span>
					<a class="clear" href="shutdown.php">
						<span class="h3 block m-t-xs"><strong id="firers">Emergency</strong></span>
						<small class="text-muted text-uc">Click to shut down</small>
					</a>
				</div>
                <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                        <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                        <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                        <span class="h3 block m-t-xs"><strong id="timeleft"><?php echo $timeleft;?></strong></span>
                        <small class="text-muted text-uc">Left to exit</small>
                    </a>
                    <script>
                        //定时程序
                        var lefttime=document.getElementById("timeleft").innerText;
                        function timego(){
                            var timeshi=lefttime.substr(0,2);
                            var timemiao=lefttime.substr(3,2);
                            if(timeshi==="00"&&timemiao==="00"){
                                window.clearInterval(timer);
                            }else if(timemiao==="00") {
                                if(timeshi==="01"){
                                    timeshi="00";
                                    timemiao="59";
                                }else if(timeshi<="10"){
                                    timeshi="0"+(--timeshi);
                                    timemiao="59";
                                }else{
                                    timeshi--;
                                    timemiao = "59";
                                }
                            }else{
                                if(timemiao<="10"){
                                    timemiao="0"+(--timemiao);
                                }else if(timemiao==="01"){
                                    timemiao="00";
                                }else
                                    timemiao--;
                            }
                            lefttime=timeshi+":"+timemiao;
                            console.log(lefttime);
                            document.getElementById("timeleft").innerText=lefttime;
                        }
                        //console.log(lefttime);
                        //var teststr="11";
                        //console.log(--teststr);
                        var timer = window.setInterval("timego()",1000);
                    </script>
                </div>
              </div>
            </section>

            <div class="row">
              <div class="col-md-8">
                <h4 class="m-t-none">Todos</h4>
                <ul class="list-group gutter list-group-lg list-group-sp sortable" id="TodoList">
<!--					need to update-->
					<?php
					global $i;
						for($i=0;$i<count($todos);$i++) {
							if($todos[$i]['disc']=='')
								continue;
							else {
								?>
								<li class="list-group-item box-shadow">
									<a href="#" class="pull-right" data-dismiss="alert" id="x<?php echo $i; ?>"
									   onclick="delTodos(<?php echo $i ?>)">
										<i class="fa fa-times icon-muted"></i>
									</a>
									<span class="pull-left media-xs">
									<a href="#todo-<?php echo $i; ?>" data-toggle="class:text-lt"
									   onclick="func(<?php echo $i; ?>)" id="<?php echo $i; ?>">
										<i class="fa fa-square-o fa-fw text"></i>
										<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
									</a>
								</span>
									<div class="clear"
										 id="todo-<?php echo $i; ?>"> <?php echo $todos[$i]['disc']; ?> </div>
								</li>
								<?php
							}
						}
					?>
                </ul>
                <div>
                  <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Add Todos" id="addt">
                    <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="button" onclick="addTodos()">Add Todos</button>
                    </span> </div>
                </div>
              </div>

              <div class="col-md-4">
                <section class="panel b-light">
                  <header class="panel-heading bg-primary dker no-border"><strong>Calendar</strong></header>
                  <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                  <!--calendar內容存在demo.js中-->
                  <div class="list-group">
					  <div class="list-group-item">
						  <label >Set Time</label>
                          <?php
                          date_default_timezone_set('PRC');//设置默认时区为中国，不然是默认美国时间
                          $nowtime=date("d-m-Y");?>
						  <input type="text" id="time" class="combodate form-control" data-format="DD-MM-YYYY" value="<?php echo $nowtime;?>" data-template="D MMM YYYY" name="datetime" />
					  </div>
					  <div class="list-group-item">
						  <label>Set Title</label>
						  <input type="text" id="title" class="form-control" />
				  </div>
					  <div class="list-group-item">
						  <label>Discription</label>
						  <input type="text" id="disc" class="form-control" />
					  </div>
					  <div class="list-group-item">
						  <button type="submit" class="btn btn-primary" onclick="location.href='setCal.php?time='+document.getElementById('time').value+'&title='+document.getElementById('title').value+'&disc='+document.getElementById('disc').value">Save changes</button>
					  </div>
                </section>
              </div>
            </div>
<!--            <div>-->
<!--              <div class="btn-group m-b" data-toggle="buttons">-->
<!---->
<!--              </div>-->
<!--              <section class="comment-list block">-->
<!--                <article id="comment-id-1" class="comment-item"> <span class="fa-stack pull-left m-l-xs"> <i class="fa fa-circle text-info fa-stack-2x"></i> <i class="fa fa-play-circle text-white fa-stack-1x"></i> </span>-->
<!--                  <section class="comment-body m-b-lg">-->
<!--                    <header> <a href="#"><strong>John smith</strong></a>  <span class="text-muted text-xs"> 24 minutes ago </span> </header>-->
<!--                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam.</div>-->
<!--                  </section>-->
<!--                </article>-->
<!--                <!-- .comment-reply -->
<!--                <article id="comment-id-2" class="comment-reply">-->
<!--                  <article class="comment-item"> <a class="pull-left thumb-sm"> <img src="images/avatar_default.jpg" class="img-circle"> </a>-->
<!--                    <section class="comment-body m-b-lg">-->
<!--                      <header> <a href="#"><strong>John smith</strong></a> <span class="text-muted text-xs"> 26 minutes ago </span> </header>-->
<!--                      <div> Morbi id neque quam. Aliquam.</div>-->
<!--                    </section>-->
<!--                  </article>-->
<!--                  <article class="comment-item"> <a class="pull-left thumb-sm"> <img src="images/avatar.jpg" class="img-circle"> </a>-->
<!--                    <section class="comment-body m-b-lg">-->
<!--                      <header> <a href="#"><strong>Mike</strong></a> <span class="text-muted text-xs"> 26 minutes ago </span> </header>-->
<!--                      <div>Good idea.</div>-->
<!--                    </section>-->
<!--                  </article>-->
<!--                </article>-->
<!--                <!-- / .comment-reply -->
<!--                <article id="comment-id-2" class="comment-item">-->
<!--                  <span class="fa-stack pull-left m-l-xs"> <i class="fa fa-circle text-danger fa-stack-2x"></i> <i class="fa fa-file-o text-white fa-stack-1x"></i> </span>-->
<!--                  <section class="comment-body m-b-lg">-->
<!--                    <header> <a href="#"><strong>John Doe</strong></a> <span class="text-muted text-xs"> 1 hour ago </span> </header>-->
<!--                    <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit.</div>-->
<!--                  </section>-->
<!--                </article>-->
<!--                <article id="comment-id-2" class="comment-item">-->
<!--                  <span class="fa-stack pull-left m-l-xs"> <i class="fa fa-circle text-success fa-stack-2x"></i> <i class="fa fa-check text-white fa-stack-1x"></i> </span>-->
<!--                  <section class="comment-body m-b-lg">-->
<!--                    <header> <a href="#"><strong>Jonathan</strong></a> completed a task <span class="text-muted text-xs"> 1 hour ago </span> </header>-->
<!--                    <div>Consecteter adipiscing elit.</div>-->
<!--                  </section>-->
<!--                </article>-->
<!--              </section>-->
<!--              <a href="message.php" class="btn btn-default btn-sm m-b"><i class="fa fa-plus icon-muted"></i> more</a> </div>-->
          </section>
        </section>
    </section>
  </section>
</section>

<script src="js/app.v2.js"></script> <!-- Bootstrap --> <!-- App -->
<script src="js/ajax.js" cache="false"></script>
<!--<script src="js/charts/easypiechart/jquery.easy-pie-chart.js" cache="false"></script>-->
<!--上面这个文件使得BUGS和EXTINGUISHERS数字变化-->
<!-- combodate -->
<script src="js/libs/moment.min.js" cache="false"></script>
<script src="js/combodate/combodate.js" cache="false"></script>
<script src="js/calendar/bootstrap_calendar.js" cache="false"></script>
<!--<script src="js/calendar/demo.js" cache="false"></script>-->
<script src="js/sortable/jquery.sortable.js" cache="false"></script>
<script src="js/calendar.js?id=<?php echo rand(); ?>" cache="false"></script>
<!--	给予一个随机数，使得浏览器不会缓存，也不需要ctrl+f5或者cmd+shift+r进行强制刷新-->
<script src="js/intro.js" cache="false"></script>
<script src="js/intro/intro.min.js"></script>
</body>
</html>
