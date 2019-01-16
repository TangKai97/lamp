@extends('home.layout.index')
@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            @foreach($orders as $k=>$v )
            <table border="0" class="order_tab" style="width:900px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="300">商品名称</td>
                <td width="80">单价</td>
                <td width="130">数量</td>
                <td width="130">状态</td>
                <td width="130">操作</td>
              </tr>
               @foreach($v->getOrdersinfo as $kk=>$vv)
              <tr>
                <td><img src="/uploads/{{$vv->gpic}}" style="width:50px;top:25px;  ">&nbsp;{{$vv->gname}}</td>
                <td>￥{{$vv->gprice}}</td>
                <td>{{$vv->gnum}}</td>

                @if($v->status == 1)
                <td>未发货</td>
                @elseif($v->status == 2)
                <td>已发货</td>
                @else
                <td>订单完成</td>
                @endif

                <td>
                    @if($v->status == 1)
                    <a href="/home/orderinfo/{{$vv->oid}}">订单详情</a>
                    @elseif($v->status == 2)
                    <a href="/home/quren/{{$vv->oid}}">确认收货</a>
                    @else
                    <a href="/home/orderinfo/{{$vv->oid}}">订单详情</a>
                    @endif
                </td><!-- <td></td> -->
                
              </tr>
              @endforeach
            </table>
          @endforeach       
        </div>
    </div>
	@endsection