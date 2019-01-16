@extends('admin.layout.index')
@section('content')

<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>用户修改</h1></span>
		<form action="/admin/huser/{{$data->id}}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			用户名:<input type="text" class="form-control" name="uname" value="{{ $data->uname }}" >
			<br>
			电话:<input type="text" class="form-control" name="utel" value=" {{ $data->utel }} ">
			<br>
			邮箱:<input type="text" class="form-control" name="email" value="{{ $data->email }}">
			<br>
			<input type="submit" class="btn btn-success btn-block" value="提交">
			<br>
		</form>
</div>
@endsection
