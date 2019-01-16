@extends('home.layout.index')
@section('content')
		<div class="m_right">
            <form action="/home/addr/{{$data->id}}" method="post">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <tr>
                <div class="mem_tit"><font color="#ff4e00">修改收货地址</font></div><br>
              </tr>
              <div style="position:relative; left:90px">
                <tr>
                  <td align="right">收货人姓名&nbsp;:&nbsp;</td>
                  <td><input type="text" value="{{$data->aname}}" class="add_ipt" name="aname" required>（必填）</td><br><br>
                  <td align="right">手机号码&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input type="text" value="{{$data->atel}}" class="add_ipt" name="atel" required>（必填）</td><br><br>
                  <td align="right">地址&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input type="text" value="{{$data->addr}}" class="add_ipt" name="addr" required>（必填）</td><br><br>
                  <td align="right">详细地址&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input type="text" value="{{$data->addrinfo}}" class="add_ipt" name="addrinfo" required>（必填）</td><br><br>
                </tr>
                <input type="submit" value="修改">
              </div>
            </form><br><br>
@endsection