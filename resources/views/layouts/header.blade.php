<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
    <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    <!-- User Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-circle"></i>
        {{session('ho-ten')}}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <i class="fas fa-info-circle mr-2"></i>
          Thông tin cá nhân
        </a>
        <div class="dropdown-divider"></div>
        <a data-toggle="modal" data-target="#modal-doi-mat-khau" class="dropdown-item">
          <i class="fas fa-key mr-2"></i>
          Đổi mật khẩu
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('logout')}}" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i>
          Đăng xuất
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- modal đổi mật khẩu -->
<div class="modal fade" id="modal-doi-mat-khau">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đổi mật khẩu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);">
          <div class="form-group">
            <label for="mat-khau-cu">Mật khẩu cũ <b class="text-danger">(*)</b></label>
            <input type="password" id="mat-khau-cu" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mat-khau-moi">Mật khẩu mới <b class="text-danger">(*)</b></label>
            <input type="password" id="mat-khau-moi" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="nhap-lai-mat-khau-moi">Nhập lại mật khẩu mới <b class="text-danger">(*)</b></label>
            <input type="password" id="nhap-lai-mat-khau-moi" class="form-control" required>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary btn-luu-doi-mat-khau">Lưu lại</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<!-- /.modal đổi mật khẩu -->
<script type="text/javascript">
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
  $('.btn-luu-doi-mat-khau').click(function(){
    var matKhauCu = $('#mat-khau-cu').val();
    var matKhauMoi = $('#mat-khau-moi').val();
    var nhapLaiMatKhauMoi = $('#nhap-lai-mat-khau-moi').val();
    if(!matKhauCu||!matKhauMoi||!nhapLaiMatKhauMoi){
      toastr.warning("Vui lòng nhập vào các ô bắt buộc.");
      return;
    }
    if(matKhauMoi!=nhapLaiMatKhauMoi){
      toastr.warning("Mật khẩu nhập lại không đúng.");
      return;
    }
    $.ajax({
      url: '{{route("doi-mat-khau")}}',
      data: {
        userName:"{{session('username')}}",
        matKhauCu:matKhauCu,
        matKhauMoi:matKhauMoi
      },
      type: "POST",
      headers: {
        'X-CSRF-Token': '{{ csrf_token() }}',
      },
      success: function(data){
        if(data==true){
          toastr.success("Đổi mật khẩu thành công.");
          $('#modal-doi-mat-khau').find('form')[0].reset();
          $('#modal-doi-mat-khau').modal('hide');
        }
        else if(data==-1){
          toastr.error("Mật khẩu cũ không đúng.");
        }
        else{
          toastr.error("Lỗi! Vui lòng thử lại.");
        }
      }, 
      error: function(err){       
        toastr.error("Lỗi! Vui lòng thử lại.");
        console.log(err);
      }
    });
  });
</script>