@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>商品详情</h1></span>
	<form action="/admin/goods" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	商品名称:<input type="text" class="form-control" name="gname" value="{{ $data->gname }}" disabled>
	<br>
	商品图片:<img src="/uploads/{{ $data->goodsinfo->gpic }}"  class="form-control" style="width:500px;height:251px;">
	<br>
	价钱:<input type="text" class="form-control" name="price"  value="{{ $data->price }}" disabled >
	<br>
	状态:<select class="form-control" id="status" name="status" disabled>
		@if($data->status == 1)
			<option value="">新品</option>
		@else if($data->status == 2)
			<option value="">在售</option>
		@endif
		</select>
	<br>
	库存:<input type="text" class="form-control" name="stock" value="{{ $data->stock }}" disabled >
	<br>
	颜色:<input type="color"  name="color" value="{{ $data->color }}" disabled>
	<br>
	<br>
	介绍:<textarea class="form-control"style=" width: 700px;height: 150px" name="gdesc" disabled >{{ $data->goodsinfo->gdesc }}</textarea>
	<br>
	</form>
</div>
@endsection