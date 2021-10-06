@extends('master')
@section('title', 'Chấm điểm')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">CHẤM ĐIỂM</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Chấm điểm</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
@php 
use App\Http\Controllers\DanTocController; 
use App\Http\Controllers\KhoaHocController; 
@endphp
<div class="row">
  @php $dsNamHoc = KhoaHocController::getDsNamHoc(); @endphp
  <div class="form-group col-sm-2">
    <label>Năm</label>
    <select class="form-control select2 chon-nam-hoc" id="chon-nam-hoc">
      <option value="-1" selected>Tất cả</option>
      @foreach($dsNamHoc as $namHoc)
      <option value="{{$namHoc->tu_nam}}">{{$namHoc->tu_nam}}</option>
      @endforeach
    </select>
  </div>
  @php $dsKhoaHoc = KhoaHocController::getDsKhoaHoc(); @endphp
  <div class="form-group col-sm-6">
    <label>Khóa học</label>
    <select class="form-control select2 chon-khoa-hoc" id="chon-khoa-hoc" required>
      <option value="" selected disabled="">Chọn khóa học</option>
      @foreach($dsKhoaHoc as $khoaHoc)
      <option value="{{$khoaHoc->id}}">{{$khoaHoc->ten_khoa_hoc}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group col-sm-3">
    <label>Tìm kiếm</label>
    <input type="text" class="form-control tim-hoc-vien" placeholder="Nhập mã hoặc tên học viên">
  </div>
  <div class="form-group col-sm-1">
    <label>&nbsp;</label>
    <button type="button" class="btn btn-block btn-outline-info form-control btn-tim"><i class="fa fa-search"></i></button>
  </div>
</div>
<!-- Default box -->
<div class="card" style="height: calc(100vh - 260px);">
  <div class="card-body" style="padding: 0px;" id="div-danh-sach-hoc-vien">
    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<script type="text/javascript">
  $(function () {
    toastr.options = {
      "debug": false,
      "positionClass": "toast-bottom-right",
      "onclick": null,
      "fadeIn": 300,
      "fadeOut": 1000,
      "timeOut": 5000,
      "extendedTimeOut": 1000,
      "progressBar": true
    }

    $('.chon-nam-hoc').on('change', function(){
      var namHoc = $('.chon-nam-hoc').val();
      $.ajax({
        url: '{{route("get-khoa-hoc-cham-diem")}}',
        data: {
          namHoc:namHoc
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){     
          $('#chon-khoa-hoc').children().remove().end().append(data);
        }, 
        error: function(err){       
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      });
    });

    $('.chon-khoa-hoc').on('change', function(){
      var idKhoaHoc = $('.chon-khoa-hoc').val();
      $.ajax({
        url: '{{route("load-danh-sach-cham-diem")}}',
        data: {
          idKhoaHoc:idKhoaHoc
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){     
          $('#div-danh-sach-hoc-vien').empty().html(data);
        }, 
        error: function(err){       
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      });
    });
  });
</script>
@endsection