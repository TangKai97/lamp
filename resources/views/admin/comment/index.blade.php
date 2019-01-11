@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>评论列表</h1></span>
	<div class="input-group">
		<form action="/admin/comment" method="get" style="display: inline-block;">
			评论用户:
			<input type="text" name="name" value="">
			<input type="submit" class="btn btn-primary" value="搜索">
			商品:
			<input type="text" name="good" value="">
			<input type="submit" class="btn btn-primary" value="搜索">
		</form>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>商品名称</th>
				<th>评论用户</th>
				<th>评论内容</th>
				<th>评论时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{$v->getGoods->gname}}</td>
				<td>{{$v->getUsers->uname}}</td>
				<td>{{ $v->content }}</td>
				<td>{{ $v->created_at }}</td>
				<td>
					<form style="display: inline-block;" method="post" action="/admin/comment/{{ $v->id }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="删除"  class="btn btn-danger">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="list-page" >{{$data->links()}}</div>
</div>
@endsection