@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>商品添加</h1></span>
	<form action="/admin/goods" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}

	商品类别:<select class="form-control" id="cid" name="cid">
			<option value="0">--请选择--</option>
			@foreach($cate as $k=>$v)
			<option value="{{ $v->cid }}">{{ $v->cname }}</option>
			@endforeach
			</select>
			<br>
	商品名称:<input type="text" class="form-control" name="gname" value="">
	<br>
	商品图片:<input type="file" class="form-control" name="gpic">
	<br>
	价钱:<input type="text" class="form-control" name="price" value="">
	<br>
	状态:<input type="text" class="form-control" name="status" value="">
	<br>
	库存:<input type="text" class="form-control" name="stock" value="">
	<br>
	颜色:<input type="color"  name="color" value="">
	<br>
	<br>
	尺码:<input type="text" class="form-control" name="size" value="">
		<br>
	介绍:<textarea class="form-control"style=" width: 700px;height: 150px" name="desc"></textarea>
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
	<br>
	</form>
</div>
@endsection