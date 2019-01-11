
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/home/css/style.css" />
    <!--[if IE 6]>
    <script src="/home/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
    
    <script type="text/javascript" src="/home/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/home/js/menu.js"></script>    
                
    <script type="text/javascript" src="/home/js/n_nav.js"></script>   
    
    <script type="text/javascript" src="/home/js/num.js">
        var jq = jQuery.noConflict();
    </script>     
    
    <script type="text/javascript" src="/home/js/shade.js"></script>
    
<title>天狗网</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
    <div class="sou">
        <span class="fr">
            <span class="fl">你好，<a href="/home/login">请登录</a>&nbsp; <a href="/home/login/register" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="/myself">个人中心</a>&nbsp;|&nbsp;<a href="/mybuy">我的订单</a>&nbsp;|&nbsp;<a href="/mylike">我的收藏</a>&nbsp;</span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="Index.html"><img src="/home/images/logo.png" /></a></div>
    <div class="search">
        <form>
            <input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
    </div>
    <div class="i_car"><a href="buycar">
            <div class="car_t">购物车 [ <span>3</span> ]</div></a>
        <div class="car_bg">
            <!--Begin 购物车未登录 Begin-->
            <div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
                <li>
                    <div class="img"><a href="#"><img src="/home/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/home/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/home/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->    
        <div class="nav">
            <div class="nav_t">全部商品分类</div>
            <div class="leftNav none"> 
                @foreach($each as $k=>$v)
                <ul>
                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="/home/images/nav1.png" /></span>
                            <span class="fl">{{$v->cname}}</span>
                        </div>
                        <div class="zj">
                            <div class="zj_l">
                                <div class="zj_l_c">
                                    <h2>{{$v->cname}}</h2>
                                    @foreach($v->sub as $kk=>$vv)
                                    <a href="/goods/{{ $vv->cid }}">{{$vv->cname}}</a>|
                                    @endforeach

                                </div>
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/home/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/home/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>               
                </ul>
                @endforeach          
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                     
        <ul class="menu_r">                                                                                                                                               
            <li><a href="/home/index">首页</a></li>
            <li><a href="Food.html">美食</a></li>
            <li><a href="Fresh.html">生鲜</a></li>
            <li><a href="HomeDecoration.html">家居</a></li>
            <li><a href="SuitDress.html">女装</a></li>
            <li><a href="MakeUp.html">美妆</a></li>
            <li><a href="Digital.html">数码</a></li>
            <li><a href="GroupBuying.html">团购</a></li>
        </ul>
    </div>
</div>
<!--End Menu End--> 
<div class="i_bg">
    <div class="content mar_20">
        
        <div class="l_list">
            <div class="list_t">
                <span class="fl list_or">
                    <a href="#" class="now">默认</a>
                    <a href="#">
                        <span class="fl">销量</span>                        
                        <span class="i_up">销量从低到高显示</span>
                        <span class="i_down">销量从高到低显示</span>                                                     
                    </a>
                    <a href="#">
                        <span class="fl">价格</span>                        
                        <span class="i_up">价格从低到高显示</span>
                        <span class="i_down">价格从高到低显示</span>     
                    </a>
                    <a href="#">新品</a>
                </span>
                <span class="fr">共发现120件</span>
            </div>
            <div class="list_c">
                
                <ul class="cate_list">
                    @foreach($data as $key=>$value)
                    <li>
                        <div class="img"><a href="/goods_info/{{ $value->gid }}"><img src="/uploads/{{$value->goodsinfo->gpic}}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span>{{$value->price}}</span></font> &nbsp; 
                        </div>
                        <div class="name"><a href="#">{{$value->gname}}</a></div>
                        <div class="carbg">
                            <a href="/home/collection/{{$value->gid}}" class="ss">收藏</a>
                            <a href="/home/shopping/{{$value->gid}}" class="j_car">加入购物车</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="pages">
                    <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer End -->    
</div>

    <!--Begin Footer Begin -->
    <div class="b_btm_bg bg_color">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/home/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
        <dl>                                                                                            
            <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
            <a href="#" class="b_sh1">新浪微博</a>            
            <a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/home/images/er.gif" width="118" height="118" /></div>
            <img src="/home/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/home/images/b_1.gif" width="98" height="33" /><img src="/home/images/b_2.gif" width="98" height="33" /><img src="/home/images/b_3.gif" width="98" height="33" /><img src="/home/images/b_4.gif" width="98" height="33" /><img src="/home/images/b_5.gif" width="98" height="33" /><img src="/home/images/b_6.gif" width="98" height="33" />
        </div>      
    </div>
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
