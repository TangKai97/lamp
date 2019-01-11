@extends('home.layout.index')
@section('content')

		<div class="m_right">
        	<div class="m_des">
            	<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115"><img src="/home/images/user.jpg" width="90" height="90" /></td>
                    <td>
                    	<div class="m_user">{{ $data->uname }}</div>
                    </td>
                  </tr>
                </table>	
            </div>

            <div class="mem_t">账号信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="40%">用户名：<span style="color:#555555;">{{$data->uname}}</span></td>
                <td width="60%">性&nbsp; &nbsp;别：<span style="color:#555555;">邀请人姓名</span></td>
              </tr>
              <tr>
                <td>年龄：<span style="color:#555555;">522555123456789</span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{{$data->email}}</span></td>
              </tr>
              <tr>
                
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{{$data->utel}}</span></td>
                <td>注册时间：<span style="color:#555555;">{{$data->created_at}}</span></td>
              </tr>
            </table>
@endsection
               
            

