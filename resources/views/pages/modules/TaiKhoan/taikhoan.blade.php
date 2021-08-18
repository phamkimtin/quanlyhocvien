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

<script>
  $(function () {
    var Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 4000
    });
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

    $( '<a class="btn btn-primary btn-them-tai-khoan" style="width: 100px"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#talbel-tai-khoan_wrapper .col-md-6:eq(0)" );

    $('.btn-them-tai-khoan').click(function(){
      alert('ád');
    });

    $('.btn-sua-tai-khoan').click(function(){
      var idTaiKhoan = $(this).attr("data-id");
      Toast.fire({
        icon: 'info',
        title: 'Thái Ba Si Thái Ba Si Thái Ba Si Thái Ba Si'
      })
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