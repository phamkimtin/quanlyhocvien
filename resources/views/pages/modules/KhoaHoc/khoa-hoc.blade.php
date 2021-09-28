@extends('master')
@section('title', 'Danh mục khóa học')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">DANH MỤC KHÓA HỌC</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Danh mục khóa học</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<!-- Default box -->
<div class="card">
  <div class="card-body" style="padding: 0px;" id="div-danh-sach-khoa-hoc">
    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@if(in_array('edit_khoa_hoc',session('quyen')))
<!-- modal thêm khóa học -->
<div class="modal fade" id="modal-them-khoa-hoc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm khóa học</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
          <div class="form-group">
            <label for="ma-khoa-hoc-them">Mã khóa học<b class="text-danger">(*)</b></label>
            <input type="text" id="ma-khoa-hoc-them" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="ten-khoa-hoc-them">Tên khóa học<b class="text-danger">(*)</b></label>
            <input type="text" id="ten-khoa-hoc-them" class="form-control" required>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="tu-nam-them">Từ năm</label>
              <input id="tu-nam-them" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask>
            </div>
            <div class="form-group col-sm-6">
              <label for="den-nam-them">Đến năm</label>
              <input id="den-nam-them" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask>
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

    $('#tu-nam-them').inputmask('yyyy', { 'placeholder': 'yyyy' });
    $('#den-nam-them').inputmask('yyyy', { 'placeholder': 'yyyy' });

    $.ajax({
      url: '{{route("load-danh-sach-khoa-hoc")}}',
      type: "GET",
      success: function(data){
        toastr.success("Load dữ liệu thành công.");
        $('#div-danh-sach-khoa-hoc').html(data);
      }, 
      error: function(err){       
        toastr.error("Lỗi! Vui lòng thử lại.");
        console.log(err);
      }
    });

    @if(in_array('edit_khoa_hoc',session('quyen')))
    $('.btn-luu-them').click(function(){
      var maKhoaHocThem = $('#ma-khoa-hoc-them').val();
      var tenKhoaHocThem = $('#ten-khoa-hoc-them').val();
      var tuNamThem = $('#tu-nam-them').val();
      var denNamThem = $('#den-nam-them').val();
      var trangThai = $('#trang-thai-them').val();
      if(!maKhoaHocThem||!tenKhoaHocThem){
        toastr.warning('Vui lòng điền vào các ô bắt buộc.');      
      }
      else{
        $.ajax({
          url: '{{route("them-khoa-hoc")}}',
          data: {
            maKhoaHocThem:maKhoaHocThem,
            tenKhoaHocThem:tenKhoaHocThem,
            tuNamThem:tuNamThem,
            denNamThem:denNamThem,
            trangThai:trangThai
          },
          type: "POST",
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(data){
            if(data==true){
              toastr.success("Thêm khóa học thành công.");
              $('#modal-them-khoa-hoc').find('form')[0].reset();
              $('#modal-them-khoa-hoc').modal('hide');
              $.ajax({
                url: '{{route("load-danh-sach-khoa-hoc")}}',
                type: "GET",
                success: function(data){
                  $('#div-danh-sach-khoa-hoc').empty();
                  $('#div-danh-sach-khoa-hoc').html(data);
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