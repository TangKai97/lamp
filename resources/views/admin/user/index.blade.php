@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>用户列表</h1></span>
	<form class="navbar-form navbar-left">
	<div class="input-group">
		<input type="text" value="" class="form-control" placeholder="请输入你想要查询的关键字.....">
		<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
	</div>
</form>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>用户名</th>
				<th>电话</th>
				<th>邮箱</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{ $v->aname }}</td>
				<td>{{ $v->atel }}</td>
				<td>{{ $v->aemail }}</td>
				<td>{{ $v->created_at }}</td>
				<td>
					<form action="/admin/user/{{ $v->id }}" method="post" style="display: inline-block;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" class="btn btn-danger" name="" value="删除">
					</form>
					<a href="/admin/user/{{ $v->id }}/edit" class="btn btn-info">修改</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection