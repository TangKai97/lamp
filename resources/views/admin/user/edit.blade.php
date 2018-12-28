@extends('admin.layout.index')
@section('content')

<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>用户修改</h1></span>
		<form action="/admin/user/{{$data->id}}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<input type="hidden" class="form-control" name="aname" value="{{ $data->id }}" >
			用户名:<input type="text" class="form-control" name="aname" value="{{ $data->aname }}" >
			<br>
			密码:<input type="password" class="form-control" name="apwd" value="{{ $data->apwd }}" disabled>
			<br>
			电话:<input type="text" class="form-control" name="atel" value=" {{ $data->atel }} ">
			<br>
			邮箱:<input type="text" class="form-control" name="aemail" value="{{ $data->aemail }}">
			<br>
			<input type="submit" class="btn btn-success btn-block" value="提交">
			<br>
		</form>
</div>
@endsection
