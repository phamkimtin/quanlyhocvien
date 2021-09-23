@extends('master')
@section('title', 'Danh mục đơn vị')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">DANH MỤC ĐƠN VỊ</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Danh mục đơn vị</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<!-- Default box -->
<div class="card">
  <div class="card-body" style="padding: 0px;" id="div-danh-sach-don-vi">
    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- modal thêm đơn vị -->
<div class="modal fade" id="modal-them-don-vi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm đơn vị</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
          <div class="form-group">
            <label for="ma-don-vi-them">Mã đơn vị<b class="text-danger">(*)</b></label>
            <input type="text" id="ma-don-vi-them" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="ten-don-vi-them">Tên đơn vị<b class="text-danger">(*)</b></label>
            <input type="text" id="ten-don-vi-them" class="form-control" required>
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
      url: '{{route("load-danh-sach-don-vi")}}',
      type: "GET",
      success: function(data){
        toastr.success("Load dữ liệu thành công.");
        $('#div-danh-sach-don-vi').html(data);
      }, 
      error: function(err){       
        toastr.error("Lỗi! Vui lòng thử lại.");
        console.log(err);
      }
    });

    $('.btn-luu-them').click(function(){
      var maDonViThem = $('#ma-don-vi-them').val();
      var tenDonViThem = $('#ten-don-vi-them').val();
      var trangThai = $('#trang-thai-them').val();
      if(!maDonViThem||!tenDonViThem){
        toastr.warning('Vui lòng điền vào các ô bắt buộc.');      
      }
      else{
        $.ajax({
          url: '{{route("them-don-vi")}}',
          data: {
            maDonViThem:maDonViThem,
            tenDonViThem:tenDonViThem,
            trangThai:trangThai
          },
          type: "POST",
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(data){
            if(data==true){
              toastr.success("Thêm đơn vị thành công.");
              $('#modal-them-don-vi').find('form')[0].reset();
              $('#modal-them-don-vi').modal('hide');
              $.ajax({
                url: '{{route("load-danh-sach-don-vi")}}',
                type: "GET",
                success: function(data){
                  $('#div-danh-sach-don-vi').empty();
                  $('#div-danh-sach-don-vi').html(data);
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
   
  });
</script>
@endsection