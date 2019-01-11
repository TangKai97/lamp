@extends('home.layout.index')
@section('content')
		<div class="m_right">
            <form action="/home/addr" method="post">
              {{ csrf_field() }}
              <tr>
                <div class="mem_tit"><font color="#ff4e00">新增收货地址</font></div><br>
              </tr>
              <div style="position:relative; left:90px">
                <tr>
                  <td align="right">收货人姓名&nbsp;:&nbsp;</td>
                  <td><input type="text" value="" class="add_ipt" placeholder="姓名" name="aname" required>（必填）</td><br><br>
                  <td align="right">手机号码&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input type="text" value="" class="add_ipt" placeholder="电话" name="atel" required>（必填）</td><br><br>
                  <td align="right">地址&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input type="text" value="" class="add_ipt" placeholder="邮寄地址" name="addr" required>（必填）</td><br><br>
                  <td align="right">详细地址&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><input type="text" value="" class="add_ipt" placeholder="如街道、小区、门牌号等" name="addrinfo" required>（必填）</td><br><br>
                </tr>
                <input type="submit" value="添加">
              </div>
            </form><br><br>
@endsection