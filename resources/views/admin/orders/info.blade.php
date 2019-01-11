@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>订单列表</h1></span>
	<form action="/admin/orders" method="get" style="display: inline-block;">
			发布人:
			<input type="text" name="name" value="">
			<input type="submit" class="btn btn-primary" value="搜索">
	</form>
	<table class="table">
		<thead>
			<tr>
				<th>订单号</th>
				<th>发货人</th>
				<th>收货人</th>
				<th>收货人电话</th>
				<th>状态</th>
				<th>收货地址</th>
				<th>订单提交时间</th>
				<th>备注信息</th>
				<th>操作</th>
			</tr>

			<tr>
				<td>{{ $data->oid }}</td>
				<td>{{ $data->getUser->uname }}</td>
				<td>{{ $data->link_man }}</td>
				<td>{{ $data->tel }}</td>
				@if( $data->status == 1)
				<td>未发货</td>
				@elseif($data->status == 2)
				<td>已发货</td>
				@elseif($data->status == 3)
				<td>确认收货</td>
				@endif
				<td>{{ $data->addr }}</td>
				<td>{{ $data->created_at }}</td>
				<td>{{ $data->msg }}</td>
				<td>
					<a href="/admin/orders" class="btn btn-info">返回</a>
					<a href="/admin/orders/fahuo/{{$data->oid}}" class="btn btn-warning">发货</a>
				</td>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<div class="list-page" ></div>
</div>
@endsection