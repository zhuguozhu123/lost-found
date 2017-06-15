<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
</title>
</head>
<body> 
<div>
<div style="margin:0px;text-align:center;background:#DDDDDD">
     <div style="margin:0px;width:100%;height:60px"><h1>待审核失物订单列表</h1></div>
</div>
    <div>
		<div style="width:20%;height:650px;float:left;background:#BBBBBB">
		<button onclick="pendingorder()" >待审核失物订单</button>
		<button onclick="onlineorder()" >上线失物订单</button>
		<button onclick="allorder()" >所有失物订单</button>
		<button onclick="logout()" >退出</button>
		</div>
		<div style="width:80%;height:650px;float:right;background:#8EE9E9">
		<table style="width:100%;background:#E6E6E6">
			<tr>
				<td>
			失物人学号
				</td>
				<td>
			失物人姓名
				</td>
				 <td>
			提交时间：
				</td>
				<td>
			失物人备注
				</td>
		   </tr>
			<?php if(is_array($list)): foreach($list as $key=>$l): ?><tr>
				<td>
				<?php echo ($l['lost_number']); ?>
				</td>
				<td>
				<?php echo ($l['lost_name']); ?>
				</td>
				<td>
				<?php echo date('Y-m-d',$l['time']); ?>
				</td>
				<td>
				<?php echo ($l['lost_desc']); ?>
				</td>
				<td>
				<a href="<?php echo U('Admin/Admin/pendingOrderDetail',array('lost_id'=>$l['lost_id']));?>" style="text-decoration:none;">详情
				</a>
				</td>
			</tr><?php endforeach; endif; ?>
			<tr>
			<td>
			<h2>
			<?php echo ($page); ?>
			</h2>
			</td>
			<tr>
		</table>
		<table>
		<tr>
		<td>
		<div style="margin-left:400px">
		<button onclick="Alledit()">
		待审核全部通过
		</button>
		</div>
		</td>
		<td>
		<div style="margin-left:150px;">
		<button onclick="Alldel()">
		待审核全部关闭
		</button>
		</div>
		</td>
		</tr>
		</table>
		</div>
	</div>
</div>



<div style="visibility:hidden;display:none">
<div id="pendingorder">
<?php echo U('Admin/Admin/pendingOrder');?>
</div>
<div id="onlineorder">
<?php echo U('Admin/Admin/onlineOrder');?>
</div>
<div id="allorder">
<?php echo U('Admin/Admin/allOrder');?>
</div>
<div id="logoutAjax">
<?php echo U('Admin/login/logoutAjax');?>
</div>
<div id="pendingAllEdit">
<?php echo U('Admin/Admin/pendingOrderAllEditAjax');?>
</div>
<div id="pendingAllDel">
<?php echo U('Admin/Admin/pendingOrderAllDelAjax');?>
</div>
</div>
	    <script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		var pendingorder = function(){
			window.location.href = $('#pendingorder').html();
		}
		var onlineorder = function(){
			window.location.href = $('#onlineorder').html();
		}
		var allorder = function(){
			window.location.href = $('#allorder').html();
		}
		var pfindadd = function(){
			window.location.href = $('#personalfindadd').html();
		}
	
		   //关闭操作
		   var Alldel= function(){
		      var r=confirm("确定全部关闭？");
             if (r==true)
             {
            $.ajax({
               url:$('#pendingAllDel').html(),
               //请求成功
               success:function(res){
                  if(res.success){
                      alert(res.msg);
                  }else {
                     alert(res.errmsg);
                  }
               },
               //请求失败
               error:function(){
                  alert('网络错误');
               }
            })
         }else{
	
		 }
		 }
		 
		
        var Alledit=function ()
        {
        var r=confirm("确定全部通过？");
        if (r==true)
        {
               $.ajax({
               url:$('#pendingAllEdit').html(),
               //请求成功
               success:function(res){
                  if(res.success){
                      alert(res.msg);
                  }else {
                     alert(res.errmsg);
                  }
               },
               //请求失败
               error:function(){
                  alert('网络错误');
               }
            })
        }
      else
        {
       
        }
        }
        var logout = function(){
		var r=confirm("确定退出该系统？");
		if(r==true){
			window.location.href = $('#logoutAjax').html();
		}else{
		
		}
	   }
</script>		 
       </script>
</body>
</html>