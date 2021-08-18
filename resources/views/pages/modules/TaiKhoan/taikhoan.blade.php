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
<!-- Default box -->
<div class="card">
  <div class="card-body" style="padding: 0px;">
    <table id="talbel-tai-khoan" class="table table-bordered table-striped table-sm">
      <thead>
        <tr>
          <th>STT</th>
          <th>Họ tên</th>
          <th>Tài khoản</th>
          <th>Di động</th>
          <th>Nhóm quyền</th>
          <th>Trạng thái</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        @foreach($dsTaiKhoan as $index => $dsTK)
        <tr>
          <td class="text-center align-middle">{{$index+1}}</td>
          <td class="align-middle">{{$dsTK->hoten}}</td>
          <td class="align-middle">{{$dsTK->username}}</td>
          <td class="align-middle">{{$dsTK->di_dong}}</td>
          <td class="align-middle">{{$dsTK->nhom_quyen}}</td>
          <td class="text-center align-middle">
            @if($dsTK->state==1)
            <span class="badge badge-success">Hoạt động</span>
            @else
            <span class="badge badge-danger">Ngừng hoạt động</span>
            @endif
          </td>
          <td class="text-center">
            <div class="btn-group">
              <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon btn-xs" data-toggle="dropdown">Hành động
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <a class="dropdown-item btn-sua-tai-khoan" data-id="{{$dsTK->id}}">
                  <i class="fas fa-pencil-alt"></i> Sửa
                </a>
                <a class="dropdown-item btn-xoa-tai-khoan" data-id="{{$dsTK->id}}">
                  <i class="fas fa-trash"></i> Xóa
                </a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

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
        <form id="form-them-tai-khoan" action="javascript:void()">
          <div class="form-group">
            <label for="ho-ten-them">Họ tên</label>
            <input type="text" id="ho-ten-them" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="tai-khoan-them">Tài khoản</label>
            <input type="text" id="tai-khoan-them" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mat-khau-them">Mật khẩu</label>
            <input type="password" id="mat-khau-them" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mat-khau-2-them">Nhập lại mật khẩu</label>
            <input type="password" id="mat-khau-2-them" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="gioi-tinh-them">Giới tính</label>
            <select id="gioi-tinh-them" class="form-control custom-select" required>
              <option value="" selected disabled>Vui lòng chọn</option>
              <option value="nam">Nam</option>
              <option value="nu">Nữ</option>
            </select>
          </div>
          <div class="form-group">
            <label for="di-dong-them">Di động</label>
            <input type="tel" id="di-dong-them" class="form-control">
          </div>
          <div class="form-group">
            <label for="nhom-quyen-them">Nhóm quyền</label>
            <select id="nhom-quyen-them" class="form-control custom-select" required>
              <option value="" selected disabled>Vui lòng chọn</option>
              <option value="quan_tri">Quản trị</option>
              <option value="nguoi_dung">Người dùng</option>
            </select>
          </div>
          <div class="form-group">
            <label for="trang-thai-them">Trạng thái</label>
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
      "extendedTimeOut": 1000
    }
    $("#talbel-tai-khoan").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "language": {
        "lengthMenu": "Display _MENU_ records per page",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Trang _PAGE_ trên _PAGES_",
        "infoEmpty": "Không có dữ liệu",
        "infoFiltered": "(lọc từ _MAX_ dòng)",
        "search": "Tìm kiếm:",
        "paginate": {
          "first":      "Đầu",
          "last":       "Cuối",
          "next":       "Sau",
          "previous":   "Trước"
        },
      }
    });

    $( '<a class="btn btn-primary btn-them-tai-khoan" style="width: 100px" data-toggle="modal" data-target="#modal-them-tai-khoan"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#talbel-tai-khoan_wrapper .col-md-6:eq(0)" );

    $('#form-them-tai-khoan').submit(function(){
      var hoTen = $('#ho-ten-them').val();
      var taiKhoan = $('#tai-khoan-them').val();
      var matKhau = $('#mat-khau-them').val();
      var gioiTinh = $('#gioi-tinh-them').val();
      var diDong = $('#di-dong-them').val();
      var nhomQuyen = $('#nhom-quyen-them').val();
      var trangThai = $('#trang-thai-them').val();
      alert(hoTen);

    });

    $('.btn-sua-tai-khoan').click(function(){
      var idTaiKhoan = $(this).attr("data-id");
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.btn-xoa-tai-khoan').click(function(){
      var idTaiKhoan = $(this).attr("data-id");
      var idTaiKhoan = $(this).attr("data-id");
      Toast.fire({
        icon: 'info',
        title: idTaiKhoan
      })
    });
   
  });
</script>
@endsection