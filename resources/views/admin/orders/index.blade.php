@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>订单列表</h1></span>
	<form action="/admin/orders" method="get" style="display: inline-block;">
			订单号:
			<input type="text" name="oid" value="">
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
				<th>订单提交时间</th>
				<th>操作</th>
			</tr>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->oid }}</td>
				<td>{{ $v->getUser->uname }}</td>
				<td>{{ $v->link_man }}</td>
				<td>{{ $v->tel }}</td>
				@if( $v->status == 1)
				<td>未发货</td>
				@elseif($v->status == 2)
				<td>已发货</td>
				@elseif($v->status == 3)
				<td>确认收货</td>
				@endif
				<td>{{ $v->created_at }}</td>
				<td>
					<form action="/admin/orders/{{ $v->oid }}" method="post" style="display: inline-block;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" class="btn btn-danger" name="" value="删除">
					</form>
					<a href="/admin/orders/{{ $v->oid }}/edit" class="btn btn-warning">修改</a>
					<a href="/admin/orders/{{ $v->oid }}" class="btn btn-info">订单详情</a>
				</td>
			</tr>
			@endforeach
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<div class="list-page" >{{$data->appends($params)->links()}}</div>
</div>
@endsection