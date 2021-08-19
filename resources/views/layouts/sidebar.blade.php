<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/logo-vnpt-app.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Quản lý học viên</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('trang-chu')}}" class="nav-link" id='menu-trang-chu'>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Trang chủ
              </p>
            </a>
          </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link" id="menu-danh-muc">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Danh mục
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('tai-khoan')}}" class="nav-link" id='menu-tai-khoan'>
                <i class="fas fa-users nav-icon"></i>
                <p>Tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index.html" class="nav-link">
                <i class="far fa-id-card nav-icon"></i>
                <p>Lớp học</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index2.html" class="nav-link">
                <i class="far fa-calendar-alt nav-icon"></i>
                <p>Khóa học</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index2.html" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>Môn học</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-address-book nav-icon"></i>
                <p>Dân tộc</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script type="text/javascript">
  var acive_menu = $('#active-menu').val();
  if("{{session('parent-active-menu')}}"){
      $('#'+"{{session('parent-active-menu')}}").addClass("active");
  }
  $('#'+"{{session('active-menu')}}").addClass("active");
</script>