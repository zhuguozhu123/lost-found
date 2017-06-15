<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/lost_found/Public/css/Basic.css">
<title>
失物招领系统
</title>
</head>
<body>
<span><h1>南苑校园失物招领系统<button onclick="logout()" style="margin-top:10px;float:right;width:200px;height:50px;color:#FCFDFA;font-size:24px;background-color:#999999">退出</button></h1></span>
 <div style="width:100%;height:5px">
       <div style="float:left;width:50%;height:5px;background-color:#FFFF00">
       </div>
       <div style="float:right;width:50%;height:5px;background-color:#22DD48">
       </div>
 </div>
<button onclick="fullMsg()" >个人信息</button>
<button onclick="alllost()" >所有失物</button>
<button onclick="pindex()" >个人失物</button>
<button onclick="pfindadd()" >捡到失物</button>
<div style="visibility:hidden;display:none">
<div id="fullMsg">
<?php echo U('Home/User/fullMsg');?>
</div>
<div id="alllost">
<?php echo U('Home/AllLost/lostlist');?>
</div>
<div id="personalindex">
<?php echo U('Home/Personal/index');?>
</div>
<div id="personalfindadd">
<?php echo U('Home/Personal/findadd');?>
</div>
<div id="logout">
<?php echo U('Home/User/logout');?>
</div>
</div>
	    <script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		var fullMsg = function(){
			window.location.href = $('#fullMsg').html();
		}
		var alllost = function(){
			window.location.href = $('#alllost').html();
		}
		var pindex = function(){
			window.location.href = $('#personalindex').html();
		}
		var pfindadd = function(){
			window.location.href = $('#personalfindadd').html();
		}
		var logout = function(){
		var r=confirm("确定退出该系统？");
		if(r==true){
			window.location.href = $('#logout').html();
		}else{
		
		}
		}
</script>
</body>
</html>