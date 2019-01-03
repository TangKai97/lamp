@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>轮播图添加</h1></span>
	<form action="/admin/banner" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	轮播图图片:<input type="file" class="form-control" name="url">
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
    </form>
</div>
@endsection