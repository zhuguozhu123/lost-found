<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>
      个人信息
   </title>
   <link rel="stylesheet" type="text/css" href="/lost_found/Public/css/fullMsg.css">
</head>
<body style="margin:10px auto;">
   <h1>个人信息</h1>
   <div style="width:100%;height:5px">
       <div style="float:left;width:50%;height:5px;background-color:#FFFF00">
       </div>
       <div style="float:right;width:50%;height:5px;background-color:#22DD48">
       </div>
   </div>
   <table style="margin:10px auto;"> 
      <tr>
         <td>
            <label><span>学号   </span></label>
            <input type="text" id="number" value="<?php echo ($user['user_number']); ?>" size="30"/>
         </td>
      </tr>
      <tr>
         <td>
            <label><span>姓名   </span></label>
            <input type="text" id="name" value="<?php echo ($user['user_name']); ?>" size="30" />
         </td>
      </tr>
      <tr>
         <td>
            <label><span>性别   </span></label>
            <input type="text" id="sex" value="<?php echo ($user['user_sex']); ?>" size="30"/>
         </td>
      </tr>
      <tr>
      <td><div class="Msg">如需更换手机号请点击验证码按钮</div><div class="Msg">验证码将发送到现在修改的手机号</div></td>
         <tr>
            <td>
               <label><span id="mobileTitle">手机号</span></label>
               <input type="text"  value="<?php echo ($user['user_mobile']); ?>" id="mobile" size="30" />
            </td>
         </tr> 
      </tr>
      <tr>  
         <td>
            <input type="text" id="code" placeholder="验证码" size="30" />
         </td>
      </tr>
      
   </table>
   <div>
      <button onclick="getCode()" id="getBtn">
        获取验证码
     </button>
     <div id="getdefaultBtn" style="display:none">
      60s后重新获取
   </div>
   <button onclick="fullMsg()">提交</button>
</div>
<div style="width:100%;height:5px">
       <div style="float:left;width:50%;height:5px;background-color:#22DD48">
       </div>
       <div style="float:right;width:50%;height:5px;background-color:#FFFF00">
       </div>
</div>

<div style="visibility:hidden;display:none">
   <div id="getCodeAjax">
      <?php echo U('Home/User/getCodeAjax');?>
   </div>
   <div id="checkCodeAjax">
      <?php echo U('Home/User/checkCodeAjax');?>
   </div>
   <div id="loginindex">
      <?php echo U('Home/User/index');?>
   </div>
</div>
<script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
<script type="text/javascript">

      //验证码码点击后需要等待60秒
      var disableBtn = function(){
         var btn = $('#getBtn');
         var defaultBtn = $('#getdefaultBtn');
         btn.hide();
         defaultBtn.show();
         var number = 60;
         defaultBtn.html(number + "s后重新获取");
         var intervalFun = function(){
            if(number == 0){
               btn.show();
               defaultBtn.hide();
               clearInterval(interval);
            }else {
               number -- ;
               defaultBtn.html(number + "s后重新获取");
            }
         }
         var interval = setInterval(function(){
            intervalFun();
         },1000);
      }

            //获取验证码
            var getCode = function(){
               var data = {
                  mobile:$('#mobile').val()
               }
               $.ajax({
                  url:$('#getCodeAjax').html(),
                  type:'post',
                  data:data,
                  success:function(res){
                     if(res.success){
                     disableBtn();//获取成功
                  }else {
                     alert(res.errmsg);
                  }
               },
               error:function(){
                  alter('网络错误');
               }
               
            })
            }


            //点击提交按钮时进行验证
            var fullMsg = function(){
               var data = {
                  mobile:$('#mobile').val(),
                  code:$('#code').val(),
                  name:$('#name').val(),
                  number:$('#number').val(),
				  sex:$('#sex').val()
               }
               $.ajax({
                  url:$('#checkCodeAjax').html(),
                  type:'post',
                  data:data,
               //请求成功
               success:function(res){
                  if(res.success){
                     alert(res.msg);
                     window.location.href = $('#loginindex').html();
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

         </script>
      </body>
      </html>