@extends('master')
@section('title', 'Phân quyền cho nhóm quyền')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">PHÂN QUYỀN CHO NHÓM QUYỀN</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Phân quyền</a></li>
      <li class="breadcrumb-item active">Phân quyền cho nhóm quyền</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header text-bold text-center">Nhóm quyền</div>
      <div class="card-body">
        @foreach($dsNhomQuyen as $index => $dsNQ)
        <div class="custom-control custom-radio">
          <input class="custom-control-input radio-nhom-quyen" type="radio" id="{{$dsNQ->ma_nhom_quyen}}" name="radio-nhom-quyen">
          <label for="{{$dsNQ->ma_nhom_quyen}}" class="custom-control-label">{{$dsNQ->ten_nhom_quyen}}</label>
        </div>
        @endforeach
      </div>  
    </div>
  </div>
  <div class="col-sm-8">
    <div class="card">
      <div class="card-header text-bold text-center">Quyền</div>
      <div class="card-body" style="padding:0px">
        <div id="div-danh-sach-quyen"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-10"></div>
  <div class="col-sm-2">
    <button type="button" class="btn btn-block btn-success btn-luu-phan-quyen">Lưu</button>
  </div>
</div>

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
      url: '{{route("load-danh-sach-quyen")}}',
      data: {
      },
      type: "POST",
      headers: {
        'X-CSRF-Token': '{{ csrf_token() }}',
      },
      success: function(data){
        $('#div-danh-sach-quyen').empty();
        $('#div-danh-sach-quyen').html(data);
      }, 
      error: function(err){       
        toastr.error("Lỗi! Vui lòng thử lại.");
        console.log(err);
      }
    })

    $('.radio-nhom-quyen').on('click', function(){
      var nhomQuyen = $(this).attr("id");
      $.ajax({
        url: '{{route("load-danh-sach-quyen")}}',
        data: {
          nhomQuyen:nhomQuyen
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){
          $('#div-danh-sach-quyen').empty();
          $('#div-danh-sach-quyen').html(data);
        }, 
        error: function(err){       
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      })
    });

    $('.btn-luu-phan-quyen').on('click', function(){
      var nhomQuyen = $('.radio-nhom-quyen:checked').attr("id");
      if(!nhomQuyen){
        toastr.error("Vui lòng chọn nhóm cần phân quyền.");
        return;
      }
      var danhSachQuyen = [];
      $(".checkbox-quyen:checkbox:checked").each(function() {
        danhSachQuyen.push($(this).attr("id"));
      });
      $.ajax({
        url: '{{route("luu-phan-quyen-nhom-quyen")}}',
        data: {
          nhomQuyen:nhomQuyen,
          danhSachQuyen:danhSachQuyen
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){
          if(data=true){
            toastr.success("Lưu thành công."); 
          }
          else{
            toastr.error("Lỗi! Vui lòng thử lại.");
          }
        }, 
        error: function(err){       
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      })
    });
  });
</script>
@endsection