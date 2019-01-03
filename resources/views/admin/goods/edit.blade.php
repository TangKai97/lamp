@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>商品修改</h1></span>
	<form action="/admin/goods/{{$data->gid}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	商品类别:<select class="form-control" id="cid" name="cid">
			@foreach($cate as $k=>$v)
			<option value=" {{ $v->cid }}">{{ $v->cname }}</option>
			@endforeach
			</select>
			<br>
	商品名称:<input type="text" class="form-control" name="gname" value="{{ $data->gname }}">
	<br>
	商品图片:<input type="file" class="form-control" name="gpic" >
			<img src="/uploads/{{ $data->goodsinfo->gpic }}"  class="form-control" style="width:500px;height:251px;">
			
	<br>
	价钱:<input type="text" class="form-control" name="price" value="{{ $data->price }}">
	<br>
	状态:<select class="form-control" id="status" name="status">
			<option value="1">1:新上架</option>
			<option value="2">2:在售</option>
		</select>
	<br>
	库存:<input type="text" class="form-control" name="stock" value="{{ $data->stock }}">
	<br>
	颜色:<input type="color"  name="color" value="{{ $data->color }}">
	<br>
	<br>
	介绍:<textarea class="form-control"style=" width: 700px;height: 150px" name="gdesc" >{{ $data->goodsinfo->gdesc }}</textarea>
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
	<br>
	</form>
</div>
@endsection