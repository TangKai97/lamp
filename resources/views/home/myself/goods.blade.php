@extends('home.layout.indexs')
@section('content')
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
@endsection
   
