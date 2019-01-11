@extends('admin.layout.index')
@section('content')

<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>订单修改</h1></span>
		<form action="/admin/orders/{{$data->oid}}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			收货人:<input type="text" class="form-control" name="link_man" value="{{ $data->link_man }}" >
			<br>
			电话:<input type="text" class="form-control" name="tel" value=" {{ $data->tel }} ">
			<br>
			收货地址:<input type="text" class="form-control" name="addr" value="{{ $data->addr }}">
			<br>
			<input type="submit" class="btn btn-success btn-block" value="提交">
			<br>
		</form>
</div>
@endsection
