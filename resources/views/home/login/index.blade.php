
<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="/hlogin/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/hlogin/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/hlogin/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/hlogin/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

  </head>

  <body>

    <div class="login-boxtitle">
      <a href="home/demo.html"><img alt="" src="/hlogin/images/logobig.png" /></a>
    </div>

    <div class="res-banner">
      <div class="res-main">
        <div class="login-banner-bg"><span></span><img src="/hlogin/images/big.jpg" /></div>
        <div class="login-box">

            <div class="am-tabs" id="doc-my-tabs">
              <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                <li class="am-active"><a href="">邮箱注册</a></li>
                <li><a href="">手机号注册</a></li>
              </ul>

              <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                  <form method="post" action="/home/login/register" id="myform1">
                  {{ csrf_field() }}
                 <div class="user-email">
                    <label for="email"><i class="am-icon-envelope-o"></i></label>
                    <input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 </div>                   
                 <div class="user-pass">
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" name="upwd" id="password" placeholder="设置密码">
                 </div>                   
                 <div class="user-pass">
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
                 </div> 
                 <div class="am-cf">
                      <input type="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                  </div>
                 </form>
                  <div class="am-cf" hidden="" id="neirong">
                      
                  </div>
                 <div class="login-links">
                    <label for="reader-me">
                      <input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
                    </label>
                  </div>
                  <script type="text/javascript">

                    var isemail,ispass,ispass2 = false;//标识符
                    //验证邮箱
                    $("#email").blur(function(){
                        if($("#email").val()=="")
                        {
                         $("#neirong").show();
                         $("#neirong").html('<font style="font-size:20px;color:red;margin-left:10px;">邮箱不能为空</font>');
                         return false;
                        }
                        var email=$("#email").val();
                        var pag_email = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
                        if(pag_email.test(email))
                        {
                          isemail = true;
                          $("#neirong").show();
                          $("#neirong").html('<font style="font-size:20px;color:#2bf666;margin-left:10px;">邮箱格式正确</font>');
                        }else{
                          isemail = false;
                          $("#neirong").show();
                          $("#neirong").html('<font style="font-size:20px;color:red;margin-left:10px;">邮箱格式不正确</font>');
                        }
                        });
                       //验证密码
                       $("#password").blur(function(){
                        if ($("#password").val()=="") {
                         $("#neirong").show();
                         $("#neirong").html('<font style="font-size:20px;color:red;margin-left:10px;">密码不能为空</font>');
                           return false;
                        }

                        var pass = $("#password").val();
                        var pag_pass = /^[a-zA-Z0-9\w]{6,14}$/;
                        if (pag_pass.test(pass)) {
                          ispass = true;
                          $("#neirong").show();
                          $("#neirong").html('<font style="font-size:20px;color:#2bf666;margin-left:10px;">密码格式正确</font>');
                        }else{
                          ispass = false;
                          $("#neirong").show();
                          $("#neirong").html('<font style="font-size:20px;color:red;margin-left:10px;">密码格式不正确</font>');
                        }
                    });
                    //验证两次密码是否一致
                    $("#passwordRepeat").blur(function(){
                        var pass1 = $("#password").val();
                        var pass2 = $("#passwordRepeat").val();
                        if (pass1 == pass2) {
                          ispass2 = true;
                         $("#neirong").show();
                         $("#neirong").html('<font style="font-size:20px;color:#2bf666;margin-left:10px;">两次密码一致</font>');
                        }else{
                          ispass2 = false;
                          $("#neirong").show();
                          $("#neirong").html('<font style="font-size:20px;color:red;margin-left:10px;">两次密码不一致</font>');
                        }
                    });
                    //阻止表单提交事件
                    $("#myform1").submit(function(){
                      if (isemail && ispass && ispass2) {
                         return true;
                      } else {
                        return false;
                      }
                    });
                  </script>

                </div>
            
                <div class="am-tab-panel">
                  <!-- 手机号注册开始 -->
                <form method="post" action="/home/login/insert" id="myform2">
                  {{ csrf_field() }}
                 <div class="user-phone">
                    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                    <input type="text" name="utel" id="phone" placeholder="请输入手机号">
                 </div>                                     
                    <div class="verification">
                      <label for="code"><i class="am-icon-code-fork"></i></label>
                      <input type="text" name="phone_code" id="code" placeholder="请输入验证码">
                      <a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
                        <span id="dyMobileButton">获取</span></a>
                    </div>
                 <div class="user-pass">
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" name="upwd" id="password2" placeholder="设置密码">
                 </div>                   
                 <div class="user-pass">
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password" name="repwd" id="passwordRepeat2" placeholder="确认密码">
                 </div> 
                 <div class="am-cf">
                      <input type="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                  </div>
                  </form>
                  <div class="am-cf" hidden="" id="neirong2">
                      
                  </div>
                  <!-- 手机号注册结束 -->
                 <div class="login-links">
                    <label for="reader-me">
                      <input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
                    </label>
                  </div>
                  <script type="text/javascript">
                     function sendMobileCode()
                     {
                      //获取手机号
                      var phone = $('#phone').val();
                      //验证
                      var phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                      if(!phone_preg.test(phone)){
                         return false;
                      }

                      //发送ajax
                      // $.get('/home/login/sendMobileCode',{'phone':phone},function(data){
                      //    console.log(data);
                      // },'json');

                     }

                     //标识符
                     var isphone,isppass,isppass2 = false;
                     //验证手机号
                     $("#phone").blur(function(){
                        if($("#phone").val()=="")
                        {
                         $("#neirong2").show();
                         $("#neirong2").html('<font style="font-size:20px;color:red;margin-left:10px;">手机号码不能为空</font>');
                         return false;
                        }
                        var phone=$("#phone").val();
                        var pag_phone = /^1{1}[3-9]{1}[\d]{9}$/;
                        if(pag_phone.test(phone))
                        {
                           var url = '/home/login/yanzheng/' + phone;
                           $.get(url,{'phone':phone},function(data){
                              if(data.code == 'success'){
                                  isphone = true;
                                  $("#neirong2").show();
                                  $("#neirong2").html('<font style="font-size:20px;color:#2bf666;margin-left:10px;">手机号可用</font>');
                              }else{
                                  $("#neirong2").show();
                                  $("#neirong2").html('<font style="font-size:20px;color:red;margin-left:10px;">该手机号已注册</font>');
                              }
                          },'json');
                          
                          
                        }else{
                          isphone = false;
                          $("#neirong2").show();
                          $("#neirong2").html('<font style="font-size:20px;color:red;margin-left:10px;">手机格式不正确</font>');
                        }

                      });
                      
                      //验证密码
                      $("#password2").blur(function(){
                        if ($("#password2").val()=="") {
                         $("#neirong2").show();
                         $("#neirong2").html('<font style="font-size:20px;color:red;margin-left:10px;">密码不能为空</font>');
                           return false;
                        }

                        var pass = $("#password2").val();
                        var pag_pass = /^[a-zA-Z0-9\w]{6,14}$/;
                        if (pag_pass.test(pass)) {
                          isppass = true;
                          $("#neirong2").show();
                          $("#neirong2").html('<font style="font-size:20px;color:#2bf666;margin-left:10px;">密码格式正确</font>');
                        }else{
                          isppass = false;
                          $("#neirong2").show();
                          $("#neirong2").html('<font style="font-size:20px;color:red;margin-left:10px;">密码格式不正确</font>');
                        }
                    });

                    //验证两次密码是否一致
                    $("#passwordRepeat2").blur(function(){
                        var pass1 = $("#password2").val();
                        var pass2 = $("#passwordRepeat2").val();
                        if (pass1 == pass2) {
                          isppass2 = true;
                         $("#neirong2").show();
                         $("#neirong2").html('<font style="font-size:20px;color:#2bf666;margin-left:10px;">两次密码一致</font>');
                        }else{
                          isppass2 = false;
                          $("#neirong2").show();
                          $("#neirong2").html('<font style="font-size:20px;color:red;margin-left:10px;">两次密码不一致</font>');
                        }
                    });

                    //阻止表单提交事件
                    $("#myform2").submit(function(){
                      if (isphone && isppass && isppass2) {
                         return true;
                      } else {
                        return false;
                      }
                    });
                  </script>
                
                  <hr>
                </div>

                <script>
                  $(function() {
                      $('#doc-my-tabs').tabs();
                    })
                </script>

              </div>
            </div>

        </div>
      </div>
      
          <div class="footer ">
            <div class="footer-hd ">
              <p>
                <a href="# ">恒望科技</a>
                <b>|</b>
                <a href="# ">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
              </p>
            </div>
            <div class="footer-bd ">
              <p>
                <a href="# ">关于恒望</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 Hengwang.com 版权所有</em>
              </p>
            </div>
          </div>
  </body>

</html>