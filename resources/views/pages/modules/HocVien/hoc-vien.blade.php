@extends('master')
@section('title', 'Quản lý học viên')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">HỌC VIÊN</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Học viên</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
@php
use App\Http\Controllers\DanTocController;
use App\Http\Controllers\DonViController;
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
    <select class="form-control select2 chon-khoa-hoc" id="chon-khoa-hoc">
      <option value="-1" selected>Tất cả</option>
      @foreach($dsKhoaHoc as $khoaHoc)
      <option value="{{$khoaHoc->ma_khoa_hoc}}">{{$khoaHoc->ten_khoa_hoc}}</option>
      @endforeach
    </select>
  </div>
</div>

<!-- Default box -->
<div class="card">
  <div class="card-body" style="padding: 0px;" id="div-danh-sach-hoc-vien">

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@if(in_array('edit_hoc_vien',session('quyen')))
<!-- modal thêm học viên -->
<div class="modal fade" id="modal-them-hoc-vien">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm học viên</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="ma-hoc-vien-them">Mã học viên <b class="text-danger">(*)</b></label>
              <input type="text" id="ma-hoc-vien-them" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="ho-ten-them">Họ tên <b class="text-danger">(*)</b></label>
              <input type="text" id="ho-ten-them" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="gioi-tinh-them">Giới tính <b class="text-danger">(*)</b></label>
              <select id="gioi-tinh-them" class="form-control custom-select" required>
                <option value="" selected disabled>Vui lòng chọn</option>
                <option value="nam">Nam</option>
                <option value="nu">Nữ</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="nam-sinh-them">Năm sinh</label>
              <input type="text" id="nam-sinh-them" class="form-control">
            </div>
            <div class="form-group col-sm-4">
              <label for="noi-sinh-them">Nơi sinh </label>
              <input type="text" id="noi-sinh-them" class="form-control">
            </div>
            <div class="form-group col-sm-4">
              <label for="di-dong-them">Di động </label>
              <input type="text" id="di-dong-them" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="chuc-vu-dang-them">Chức vụ Đảng</label>
              <input type="text" id="chuc-vu-dang-them" class="form-control">
            </div>
            <div class="form-group col-sm-4">
              <label for="chuc-vu-chinh-quyen-them">Chức vụ Chính quyền</label>
              <input type="text" id="chuc-vu-chinh-quyen-them" class="form-control">
            </div>
            @php
            $dsDanToc = DanTocController::getDsDanToc();
            @endphp
            <div class="form-group col-sm-4">
              <label for="dan-toc-them">Dân tộc <b class="text-danger">(*)</b></label>
              <select id="dan-toc-them" class="form-control custom-select" required>
                <option value="" selected disabled>Vui lòng chọn</option>
                @foreach($dsDanToc as $danToc)
                <option value="{{$danToc->ma_dan_toc}}">{{$danToc->ten_dan_toc}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            @php
            $dsDonVi = DonViController::getDsDonVi();
            @endphp
            <div class="form-group col-sm-6">
              <label for="don-vi-them">Đơn vị <b class="text-danger">(*)</b></label>
              <select id="don-vi-them" class="form-control custom-select" required>
                <option value="" selected disabled>Vui lòng chọn</option>
                @foreach($dsDonVi as $donVi)
                <option value="{{$donVi->ma_don_vi}}">{{$donVi->ten_don_vi}}</option>
                @endforeach
              </select>
            </div>
            @php
            $dsKhoaHoc = KhoaHocController::getDsKhoaHoc();
            @endphp
            <div class="form-group col-sm-6">
              <label for="khoa-hoc-them">Khóa học <b class="text-danger">(*)</b></label>
              <select id="khoa-hoc-them" class="form-control custom-select" required>
                <option value="0" selected>Chưa có khóa học</option>
                @foreach($dsKhoaHoc as $khoaHoc)
                <option value="{{$khoaHoc->ma_khoa_hoc}}">{{$khoaHoc->ten_khoa_hoc}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="tai-khoan-them">Tài khoản <b class="text-danger">(*)</b></label>
              <input type="text" id="tai-khoan-them" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="mat-khau-them">Mật khẩu <b class="text-danger">(*)</b></label>
              <input type="text" id="mat-khau-them" class="form-control" value="vnpt" disabled required>
            </div>
            <div class="form-group col-sm-4">
              <label for="trang-thai-them">Trạng thái <b class="text-danger">(*)</b></label>
              <select id="trang-thai-them" class="form-control custom-select">
                <option value="0" selected>Chờ duyệt</option>
                <option value="1">Chính thức</option>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary btn-luu-them">Lưu lại</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endif

<script>
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

    $.ajax({
      url: '{{route("load-danh-sach-hoc-vien")}}',
      type: "GET",
      success: function(data){
        toastr.success("Load dữ liệu thành công.");
        $('#div-danh-sach-hoc-vien').html(data);
      },
      error: function(err){
        toastr.error("Lỗi! Vui lòng thử lại.");
        console.log(err);
      }
    });

  });
  @if(in_array('edit_hoc_vien', session('quyen')))
  $('.btn-luu-them').on('click', function(){
    var maHocVien = $('#ma-hoc-vien-them').val();
    var hoTen = $('#ho-ten-them').val();
    var gioiTinh = $('#gioi-tinh-them').val();
    var namSinh = $('#nam-sinh-them').val();
    var noiSinh = $('#noi-sinh-them').val();
    var diDong = $('#di-dong-them').val();
    var chucVuDang = $('#chuc-vu-dang-them').val();
    var chucVuCQ = $('#chuc-vu-chinh-quyen-them').val();
    var idDanToc = $('#dan-toc-them').val();
    var idDonVi = $('#don-vi-them').val();
    var idKhoaHoc = $('#khoa-hoc-them').val();
    var userName = $('#tai-khoan-them').val();
    var state = $('#trang-thai-them').val();
    if(!maHocVien||!hoTen||!gioiTinh||!idDanToc||!idDonVi||!idKhoaHoc||!userName||!state){
      toastr.warning('Vui lòng điền vào các ô bắt buộc.');
    }
    else{
      $.ajax({
        url: '{{route("them-hoc-vien")}}',
        data: {
          maHocVien:maHocVien,
          hoTen:hoTen,
          gioiTinh:gioiTinh,
          namSinh:namSinh,
          noiSinh:noiSinh,
          diDong:diDong,
          chucVuDang:chucVuDang,
          chucVuCQ:chucVuCQ,
          idDanToc:idDanToc,
          idDonVi:idDonVi,
          idKhoaHoc:idKhoaHoc,
          userName:userName,
          state:state
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){
          if(data=='trung_username'){
            toastr.warning("Tên đăng nhập này đã được sử dụng.");
          }
          else if(data==true){
            toastr.success("Thêm học viên thành công.");
            $('#modal-them-hoc-vien').find('form')[0].reset();
            $('#modal-them-hoc-vien').modal('hide');
            $.ajax({
              url: '{{route("load-danh-sach-hoc-vien")}}',
              type: "GET",
              success: function(data){
                $('#div-danh-sach-hoc-vien').empty();
                $('#div-danh-sach-hoc-vien').html(data);
              },
              error: function(err){
                toastr.error("Lỗi! Vui lòng thử lại.");
                console.log(err);
              }
            });
          }
        },
        error: function(err){
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      });
    }
  });
  @endif

  $('.chon-nam-hoc').on('change', function(){
    var namHoc = $('.chon-nam-hoc').val();
    $.ajax({
      url: '{{route("get-khoa-hoc-by-nam-hoc")}}',
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
    var maKhoaHoc = $('.chon-khoa-hoc').val();
    if(maKhoaHoc==-1){
      $.ajax({
        url: '{{route("load-danh-sach-hoc-vien")}}',
        type: "GET",
        success: function(data){
          toastr.success("Load dữ liệu thành công.");
          $('#div-danh-sach-hoc-vien').html(data);
        },
        error: function(err){
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      });
    }
    else{
      $.ajax({
        url: '{{route("load-hoc-vien-by-khoa-hoc")}}',
        data: {
          maKhoaHoc:maKhoaHoc
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){
          toastr.success("Load dữ liệu thành công.");
          $('#div-danh-sach-hoc-vien').html(data);
        },
        error: function(err){
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      });
    }
  });
</script>
@endsection
