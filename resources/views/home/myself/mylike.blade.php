@extends('home.layout.index')
@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">
            	<span class="fr" style="font-size:12px; color:#55555; font-family:'宋体'; margin-top:5px;"></span>我的收藏
            </div>
           	<table border="0" class="order_tab" style="width:930px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                       
                <td align="center" width="420">商品名称</td>
                <td align="center" width="180">价格</td>
                <td align="center" width="270">操作</td>
              </tr>
              @foreach($data as $k=>$v)
              <tr>
                <td style="font-family:'宋体';">
                	<div class="sm_img"><img src="/uploads/{{ $v->Look->gpic }}" width="48" height="48" /></div>{{$v->gname}}
                </td>
                <td align="center">￥{{$v->price}}</td>
                <td align="center"><a href="#" style="color:#ff4e00;">加入购物车</a>&nbsp; &nbsp; <a href="/home/delete/{{$v->id}}">删除</a></td>
              </tr>
              @endforeach
            </table>
@endsection