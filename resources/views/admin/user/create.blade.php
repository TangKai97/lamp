@extends('admin.layout.index')
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>用户添加</h1></span>
	<form action="/admin" method="post">
	{{ csrf_field() }}
	用户名:<input type="text" class="form-control" name="aname" value="{{ old('aname') }}">
	<br>
	密码:<input type="password" class="form-control" name="apwd" value="">
	<br>
	确认密码:<input type="password" class="form-control" name="reapwd" value="">
	<br>
	电话:<input type="text" class="form-control" name="atel" value="">
	<br>
	邮箱:<input type="text" class="form-control" name="aemail" value="">
	<br>
	<input type="submit" class="btn btn-success btn-block"  value="提交">
	<br>
	</form>
</div>
@endsection