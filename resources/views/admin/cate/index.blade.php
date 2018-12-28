@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>用户列表</h1></span>
	<form class="navbar-form navbar-left" action="/admin/user" method="get">
	<div class="input-group">
		<input type="text" value="" class="form-control" name="aname" placeholder="请输入你想要查询的关键字.....">
		<span class="input-group-btn">
			<button type="button" class="btn btn-primary">Go</button>
		</span>
	</div>
	</form>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>分类名称</th>
				<th>所属分类PID</th>
				<th>所属路径</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->cid }}</td>
				<td>{{ $v->cname }}</td>
				<td>{{ $v->pid }}</td>
				<td>{{ $v->path }}</td>
				<td>
					<form style="display: inline-block;" method="post" action="/admin/cate/{{ $v->cid }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="删除"  class="btn btn-danger">
					</form>
					<a href="/admin/cate/{{ $v->cid }}/edit" class="btn btn-warning">修改</a>
					<a href="/admin/cate/{{ $v->cid }}" class="btn btn-info">添加子分类</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="list-page" ></div>
</div>
@endsection