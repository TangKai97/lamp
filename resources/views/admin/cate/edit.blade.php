@extends('admin.layout.index')
@section('content')
<div class="panel-body">
	<span class="page-title" style="text-align: center;"><h1>修改类别</h1></span>
	<form action="/admin/cate/{{ $cates->cid }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		类别名称:<input type="text" class="form-control" name="cname" id="cname" value="{{ $cates->cname }}">
		<br>
		所属分类:
		<select class="form-control" id="pid" name="pid">
			<option value="0">--请选择--</option>
			@foreach($data as $k=>$v)
			<option value="{{ $v->cid }}" {{ $cates->pid == $v->cid ? 'selected' : '' }} >{{ $v->cname }}</option>
			@endforeach
		</select>
		<br>
		<input type="submit" class="btn btn-success btn-block"  value="提交">
	</form>
</div>
@endsection