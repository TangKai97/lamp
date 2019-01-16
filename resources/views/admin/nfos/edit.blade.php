@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>广告修改</h1></span>
	<form action="/admin/nfos/{{ $data->id }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	原图片:<img src="/uploads/{{ $data->ipic }}" style="width: 200px; height: 150px">
	<br>
	修改图片:<input type="file" class="form-control" name="ipic">
	<br>
	广告信息:<input type="text" class="form-control" name="info" value="{{ $data->info }}">
	<br>
	商品价格:<input type="text" class="form-control" name="price" value="{{ $data->price }}">
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
    </form>
</div>
@endsection