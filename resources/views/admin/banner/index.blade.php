@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>轮播图列表</h1></span>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>图片</th>
				<th>图片状态</th>
				<th>添加时间</th>
				<th>修改时间</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{ $v->id }}</td>
				<td><img src="/uploads/{{ $v->url }}" style="width: 300px; height: 120px;"></td>
				@if($v->status == 2) 
				<td>禁用</td>
				@elseif($v->status == 1)
				<td>开启</td>
				@endif
				<td>{{ $v->created_at }}</td>
				<td>{{ $v->updated_at }}</td>
				<td>
					<form style="display: inline-block;" method="post" action="/admin/banner/{{ $v->id }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="删除"  class="btn btn-danger">
					</form>
					<a href="/admin/banner/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
					@if( $v->status == 2)
                        <a href="/admin/banner/kaiqi/{{ $v->id }}" class="btn btn-info">开启</a>
					@elseif( $v->status == 1 )
                        <a href="/admin/banner/jinyong/{{ $v->id }}" class="btn btn-info">禁用</a>
					@endif
					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="list-page" ></div>
</div>
@endsection