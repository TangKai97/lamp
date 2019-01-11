@extends('home.layout.index')
@section('content')
<form action="/home/updated/{{$data->id}}" method="get" enctype="multipart/form-data">
  <span class="page-title" style="text-align: center;"><h1>修改个人信息</h1></span>
  <div class="form-group">
    <label for="uname">用户名</label>
    <input type="text" class="form-control" id="uname" name="uname" value="{{$data->uname}}" placeholder="">
  </div>
  <div class="form-group">
    <label for="hhead">头像</label>
    <input type="file" id="hhead" name="hhead">
  </div>
  <div class="radio">
  <label>男:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hsex" id="optionsRadios1" value="" checked>
        女:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="hsex" id="optionsRadios1" value="" >
  </label>
  </div>
  <div class="form-group">
    <label for="utel">电话</label>
    <input type="text" class="form-control" id="utel" name="utel" value="{{ $data->utel }}" placeholder="">
  </div>
   <div class="form-group">
    <label for="hage">年龄</label>
    <input type="text" class="form-control" id="hage" name="hage" value="{{ $data->hage }}" placeholder="">
  </div>
  <button type="submit" class="btn btn-default">提交</button>
</form>
@endsection