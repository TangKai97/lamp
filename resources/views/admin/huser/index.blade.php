@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>用户列表</h1></span>
	<form action="/admin/huser" method="get" style="display: inline-block;">
			发布人:
			<input type="text" name="name" value="">
			<input type="submit" class="btn btn-primary" value="搜索">
	</form>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>用户名</th>
				<th>电话</th>
				<th>邮箱</th>
				<th>状态</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{ $v->uname }}</td>
				<td>{{ $v->utel }}</td>
				<td>{{ $v->email }}</td>
				@if( $v->status == 1)
				<td>未激活</td>
				@elseif($v->status == 2)
				<td>已激活</td>
				@endif
				<td>{{ $v->created_at }}</td>
				<td>
					<form action="/admin/huser/{{ $v->id }}" method="post" style="display: inline-block;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" class="btn btn-danger" name="" value="删除">
					</form>
					<a href="/admin/huser/{{ $v->id }}/edit" class="btn btn-info">修改</a>
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