@extends('master')
@section('title', 'Danh mục khóa học')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">XẾP HỌC VIÊN VÀO KHÓA HỌC</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Xếp khóa học</li>
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
    <select class="form-control select2 chon-khoa-hoc" id="chon-khoa-hoc" required>
      <option value="" selected disabled="">Chọn khóa học</option>
      @foreach($dsKhoaHoc as $khoaHoc)
      <option value="{{$khoaHoc->ma_khoa_hoc}}">{{$khoaHoc->ten_khoa_hoc}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="card card-default">
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <div class="row">
            <div class="text-left col-sm-6 text-bold">Danh sách học viên chưa được xếp vào khóa học</div>
            <div class="text-right col-sm-6 text-bold">Danh sách học viên thêm vào khóa học</div>
          </div>
          <select class="duallistbox" multiple="multiple">
            @foreach($dsHocVien as $hocVien)
            <option value="{{$hocVien->id_user}}">{{$hocVien->hoten}} - {{$hocVien->ma_hoc_vien}} - {{$hocVien->ten_don_vi}}</option>
            @endforeach
          </select>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="text-right">
      <button class="btn btn-success btn-luu-xep-khoa-hoc w-25">Lưu</button>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

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
    };

    // Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox({
      infoText: 'Tổng số {0} học viên',
      filterPlaceHolder: 'Tìm kiếm',
      infoTextFiltered: '<span class="badge badge-warning">Tìm thấy</span> {0} từ {1} học viên',
      filterTextClear: 'Hiển thị tất cả',
      infoTextEmpty: 'Danh sách trống',
      selectorMinimalHeight: 300
    });

    $('.chon-nam-hoc').on('change', function(){
      var namHoc = $('.chon-nam-hoc').val();
      $.ajax({
        url: '{{route("get-khoa-hoc")}}',
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

    $('.btn-luu-xep-khoa-hoc').on('click', function(){
      var maKhoaHoc = $('.chon-khoa-hoc').val();
      var dsHocVien = $('.duallistbox').val();
      if(!maKhoaHoc){
        toastr.warning('Vui lòng chọn khóa học.');    
      }
      else if(dsHocVien==''){
        toastr.warning('Danh sách học viên trống.');
      }
      else{
        $.ajax({
          url: '{{route("luu-xep-khoa-hoc")}}',
          data: {
            maKhoaHoc:maKhoaHoc,
            dsHocVien:dsHocVien
          },
          type: "POST",
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(data){    
            if(data==true){
              toastr.success("Xếp khóa học thành công.");
            }
          }, 
          error: function(err){       
            toastr.error("Lỗi! Vui lòng thử lại.");
            console.log(err);
          }
        });
      }
    });
  });
</script>
@endsection