@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>友情链接添加</h1></span>
	<form action="/admin/friend" method="post">
	{{ csrf_field() }}
	链接名:<input type="text" class="form-control" name="fname" value="">
	<br>
	链接地址:<input type="text" class="form-control" name="flink" value="">
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
	<br>
	</form>
</div>
@endsection