@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>轮播图修改</h1></span>
	<form action="/admin/banner/{{ $data->id }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	原图片:<img src="/uploads/{{ $data->url }}" style="width: 100%; height: 300px">
	<br>
	轮播图图片:<input type="file" class="form-control" name="url">
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
    </form>
</div>
@endsection