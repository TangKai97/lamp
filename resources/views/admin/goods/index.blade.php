@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>商品列表</h1></span>
	<div class="input-group">
		<form action="/admin/goods" method="get" style="display: inline-block;">
			发布人:
			<input type="text" name="name" value="">
			<input type="submit" class="btn btn-primary" value="搜索">
		</form>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>商品名称</th>
				<th>库存</th>
				<th>价格</th>
				<th>状态</th>
				<th>颜色</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->gid }}</td>
				<td>{{ $v->gname }}</td>
				<td>{{ $v->stock }}</td>
				<td>{{ $v->price }}</td>
				<td>{{ $v->status }}</td>
				<td>{{ $v->color }}</td>
				<td>{{ $v->created_at }}</td>
				<td>
					<form style="display: inline-block;" method="post" action="/admin/goods/{{ $v->gid }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="删除"  class="btn btn-danger">
					</form>
					<a href="/admin/goods/{{ $v->gid }}/edit" class="btn btn-warning">修改</a>
					<a href="/admin/goods/{{ $v->gid }}" class="btn btn-info">查看详情</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="list-page" >{{$data->links()}}</div>
</div>
@endsection