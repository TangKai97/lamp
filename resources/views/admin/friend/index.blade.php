@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>友情链接列表</h1></span>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>链接名</th>
				<th>链接地址</th>
				<th>添加时间</th>
				<th>修改时间</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{ $v->fname }}</td>
				<td>{{ $v->flink }}</td>
				<td>{{ $v->created_at }}</td>
				<td>{{ $v->updated_at }}</td>
				<td>
					<form style="display: inline-block;" method="post" action="/admin/friend/{{ $v->id }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="删除"  class="btn btn-danger">
					</form>
					<a href="/admin/friend/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="list-page" ></div>
</div>
@endsection