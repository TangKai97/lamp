@extends('home.layout.index')
@section('content')
<script type="text/javascript" src="/home/js/jquery-1.8.2.min.js"></script>
   <form method="post" action="/home/update/18" id="myform">
   	{{ csrf_field() }}
    <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
      <tr height="50" valign="top">
      	<td width="95">&nbsp;</td>
        <td>
        	<span class="fl" style="font-size:24px;">修改密码</span>
        </td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;原密码 &nbsp;</td>
        <td><input type="password" value="" class="l_pwd" id="oldpass" name="oldpassword" /><span id="span3">&nbsp;</span></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
        <td><input type="password" value="" class="l_pwd" id="pass" name="password" /><span id="span1">&nbsp;</span></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
        <td><input type="password" value="" class="l_pwd" id="recpass" name="recpassword" /><span id="span2"></span></td>
      </tr>
      <tr height="60">
      	<td>&nbsp;</td>
        <td>
        	<button type="submit" id="log_btn" class="log_btn">立即修改</button>
        </td>
      </tr>
    </table>
   </form>
<script type="text/javascript">
	$(function(){
		  var ispass,ispass2,isoldpass = false;//标识符
		  $("#pass").focus(function(){
			$("#span1").html('<font style="font-size:15px;color:#ccc;margin-left:10px;">请输入6-14位字母,数字,下划线组合的密码</font>');
		  });
		   //验证密码
		   $("#pass").blur(function(){
		     if ($("#pass").val()=="") {
		     $("#span1").html('<font style="font-size:15px;color:red;margin-left:10px;">密码不能为空</font>');
		       return false;
		     }

		    var pass = $("#pass").val();
		    var pag_pass = /^[a-zA-Z0-9\w]{6,14}$/;
		    if (pag_pass.test(pass)) {
		      ispass = true;
		      $("#span1").html('<font style="font-size:15px;color:#2bf666;margin-left:10px;">密码格式正确</font>');
		    }else{
		      ispass = false;
		      $("#span1").html('<font style="font-size:15px;color:red;margin-left:10px;">密码格式不正确</font>');
		    }
        });
        //验证两次密码是否一致
        $("#recpass").blur(function(){
            var pass1 = $("#pass").val();
            var pass2 = $("#recpass").val();
            if (pass1 == pass2) {
              ispass2 = true;
             $("#span2").html('<font style="font-size:15px;color:#2bf666;margin-left:10px;">两次密码一致</font>');
            }else{
              ispass2 = false;
              $("#span2").html('<font style="font-size:15px;color:red;margin-left:10px;">两次密码不一致</font>');
            }
        });
      //验证原密码
      $("#oldpass").blur(function(){
         if ($("#oldpass").val()=="") {
         $("#span3").html('<font style="font-size:15px;color:red;margin-left:10px;">原密码不能为空</font>');
           return false;
         }

       var oldpass = $("#oldpass").val();
       var url = '/home/change/yanzheng/' + oldpass;
       $.get(url,{'oldpass':oldpass},function(data){
          if(data.code == 'success'){
              isoldpass = true;
              $("#span3").html('<font style="font-size:20px;color:#2bf666;margin-left:10px;">原密码正确</font>');
          }else{
              $("#span3").html('<font style="font-size:20px;color:red;margin-left:10px;">原密码不正确</font>');
          }
      },'json');
       });
     //阻止表单默认提交事件
		$('#log_btn').click(function(){

			 if(ispass2 && ispass && oldpass){
	     	return true;
	     }else{
	     	return false;
	     }
		})
	})
</script>
@endsection