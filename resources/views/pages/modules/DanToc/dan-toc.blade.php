@extends('master')
@section('title', 'Danh mục dân tộc')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">DANH MỤC DÂN TỘC</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
      <li class="breadcrumb-item active">Danh mục dân tộc</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<!-- Default box -->
<div class="card">
  <div class="card-body" style="padding: 0px;" id="div-danh-sach-dan-toc">
    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- modal thêm dân tộc -->
<div class="modal fade" id="modal-them-dan-toc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm dân tộc</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
          <div class="form-group">
            <label for="ma-dan-toc-them">Mã dân tộc<b class="text-danger">(*)</b></label>
            <input type="text" id="ma-dan-toc-them" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="ten-dan-toc-them">Tên dân tộc<b class="text-danger">(*)</b></label>
            <input type="text" id="ten-dan-toc-them" class="form-control" required>
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
      url: '{{route("load-danh-sach-dan-toc")}}',
      type: "GET",
      success: function(data){
        toastr.success("Load dữ liệu thành công.");
        $('#div-danh-sach-dan-toc').html(data);
      }, 
      error: function(err){       
        toastr.error("Lỗi! Vui lòng thử lại.");
        console.log(err);
      }
    });

    $('.btn-luu-them').click(function(){
      var maDanTocThem = $('#ma-dan-toc-them').val();
      var tenDanTocThem = $('#ten-dan-toc-them').val();
      var trangThai = $('#trang-thai-them').val();
      if(!maDanTocThem||!tenDanTocThem){
        toastr.warning('Vui lòng điền vào các ô bắt buộc.');      
      }
      else{
        $.ajax({
          url: '{{route("them-dan-toc")}}',
          data: {
            maDanTocThem:maDanTocThem,
            tenDanTocThem:tenDanTocThem,
            trangThai:trangThai
          },
          type: "POST",
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(data){
            if(data==true){
              toastr.success("Thêm dân tộc thành công.");
              $('#modal-them-dan-toc').find('form')[0].reset();
              $('#modal-them-dan-toc').modal('hide');
              $.ajax({
                url: '{{route("load-danh-sach-dan-toc")}}',
                type: "GET",
                success: function(data){
                  $('#div-danh-sach-dan-toc').empty();
                  $('#div-danh-sach-dan-toc').html(data);
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