@extends('master')
@section('title', 'Quản lý tài khoản')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">TÀI KHOẢN</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Tài khoản</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
@php use App\Http\Controllers\NhomQuyenController; @endphp
<!-- Default box -->
<div class="card">
  <div class="card-body" style="padding: 0px;" id="div-danh-sach-tai-khoan">
    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@if(in_array('edit_tai_khoan',session('quyen')))
<!-- modal thêm tài khoản -->
<div class="modal fade" id="modal-them-tai-khoan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm tài khoản</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="ho-ten-them">Họ tên <b class="text-danger">(*)</b></label>
              <input type="text" id="ho-ten-them" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
              <label for="gioi-tinh-them">Giới tính <b class="text-danger">(*)</b></label>
              <select id="gioi-tinh-them" class="form-control custom-select" required>
                <option value="" selected disabled>Vui lòng chọn</option>
                <option value="nam">Nam</option>
                <option value="nu">Nữ</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="tai-khoan-them">Tài khoản <b class="text-danger">(*)</b></label>
              <input type="text" id="tai-khoan-them" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
              <label for="mat-khau-them">Mật khẩu</label>
              <input type="text" id="mat-khau-them" class="form-control" value="vnpt" disabled required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="di-dong-them">Di động</label>
              <input type="tel" id="di-dong-them" class="form-control">
            </div>
            @php
            $nhomQuyen = NhomQuyenController::getNhomQuyen();
            @endphp
            <div class="form-group col-sm-6">
              <label for="nhom-quyen-them">Nhóm quyền <b class="text-danger">(*)</b></label>
              <select id="nhom-quyen-them" class="form-control custom-select" required>
                <option value="" selected disabled>Vui lòng chọn</option>
                @foreach($nhomQuyen as $index => $value)
                <option value="{{$value->ma_nhom_quyen}}">{{$value->ten_nhom_quyen}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="trang-thai-them">Trạng thái <b class="text-danger">(*)</b></label>
            <select id="trang-thai-them" class="form-control custom-select">
              <option value="1" selected>Hoạt động</option>
              <option value="0">Ngừng hoạt động</option>
            </select>
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
      url: '{{route("load-danh-sach-tai-khoan")}}',
      type: "GET",
      success: function(data){
        toastr.success("Load dữ liệu thành công.");
        $('#div-danh-sach-tai-khoan').html(data);
      }, 
      error: function(err){       
        toastr.error("Lỗi! Vui lòng thử lại.");
        console.log(err);
      }
    });

    @if(in_array('edit_tai_khoan',session('quyen')))
    $('.btn-luu-them').click(function(){
      var hoTen = $('#ho-ten-them').val();
      var taiKhoan = $('#tai-khoan-them').val();
      var matKhau = $('#mat-khau-them').val();
      var gioiTinh = $('#gioi-tinh-them').val();
      var diDong = $('#di-dong-them').val();
      var nhomQuyen = $('#nhom-quyen-them').val();
      var trangThai = $('#trang-thai-them').val();
      if(!hoTen||!taiKhoan||!matKhau||!nhomQuyen){
        toastr.warning('Vui lòng điền vào các ô bắt buộc.');      
      }
      else{
        $.ajax({
          url: '{{route("them-tai-khoan")}}',
          data: {
            hoTen:hoTen,
            taiKhoan:taiKhoan,
            matKhau:matKhau,
            gioiTinh:gioiTinh,
            diDong:diDong,
            nhomQuyen:nhomQuyen,
            trangThai:trangThai
          },
          type: "POST",
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(data){
            if(data==true){
              toastr.success("Thêm tài khoản thành công.");
              $('#modal-them-tai-khoan').find('form')[0].reset();
              $('#modal-them-tai-khoan').modal('hide');
              $.ajax({
                url: '{{route("load-danh-sach-tai-khoan")}}',
                type: "GET",
                success: function(data){
                  $('#div-danh-sach-tai-khoan').empty();
                  $('#div-danh-sach-tai-khoan').html(data);
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
  });
</script>
@endsection