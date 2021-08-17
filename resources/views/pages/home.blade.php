@extends('master')
@section('title', 'Page Title')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Tiêu đề</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Dashboard v1</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
  {{Session::get('username')}}
  @for($i=1;$i<1000;$i++)
    Nội dung Thái ba si <br>
  @endfor
@endsection