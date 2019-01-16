@extends('home.layout.index')
@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">订单详情</div>
            @foreach($orders as $k=>$v )
            <table border="0" class="car_tab" style="width:950px;" cellspacing="0" cellpadding="0">
                  <tbody>
                      
                      <tr>
                        <td class="car_th" width="350">订单号:{{$v->oid}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="car_th" width="200">{{$v->created_at}}</td>
                        <td class="car_th" width="130">收货人:{{$v->getaddr->aname}}</td>
                      </tr>
                      @foreach($v->getOrdersinfo as $kk=>$vv)
                      <tr>
                        <td>
                            <div class="c_s_img"><img src="/uploads/{{$vv->gpic}}" width="73" height="73"></div>
                            {{$vv->gname}}
                        </td>
                        <td align="center">x{{$vv->gnum}}</td>
                        <td align="center" style="color:#ff4e00;">￥{{$vv->gprice *$vv->gnum}}</td>
                      </tr>
                       @endforeach                        
                      <tr>
                        <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                            <p align="left">收货地址:{{$v->getaddr->addr.$v->getaddr->addrinfo}}</p> &nbsp;&nbsp;&nbsp;&nbsp;商品总价：￥{{$v->total}}  
                        </td>
                      </tr>
                     
                </tbody>
            </table> 
            @endforeach   
        </div>
    </div>
	@endsection