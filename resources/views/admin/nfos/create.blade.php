@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>广告位添加</h1></span>
	<form action="/admin/nfos" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	广告信息:<input type="text" class="form-control" name="info">
	广告图片:<input type="file" class="form-control" name="ipic">
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
    </form>
</div>
@endsection