<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('trang-chu')}}" class="brand-link">
    <img src="dist/img/logo-vnpt-app.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">TRƯỜNG CHÍNH TRỊ</span>
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
        <li class="nav-item">
          <a href="{{route('cham-diem')}}" class="nav-link" id='menu-cham-diem'>
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Chấm điểm
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link" id="menu-quan-ly">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Quản lý
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if(in_array('view_hoc_vien',session('quyen')))
            <li class="nav-item">
              <a href="{{route('hoc-vien')}}" class="nav-link" id='menu-hoc-vien'>
                <i class="fas fa-graduation-cap nav-icon"></i>
                <p>Học viên</p>
              </a>
            </li>
            @endif
            @if(in_array('view_khoa_hoc',session('quyen')))
            <li class="nav-item">
              <a href="{{route('khoa-hoc')}}" class="nav-link" id='menu-khoa-hoc'>
                <i class="far fa-calendar-alt nav-icon"></i>
                <p>Khóa học</p>
              </a>
            </li>
            @endif
            @if(in_array('view_mon_hoc',session('quyen')))
            <li class="nav-item">
              <a href="{{route('mon-hoc')}}" class="nav-link" id='menu-mon-hoc'>
                <i class="fas fa-book-open nav-icon"></i>
                <p>Môn học</p>
              </a>
            </li>
            @endif
            @if(in_array('xep_khoa_hoc',session('quyen')))
            <li class="nav-item">
              <a href="{{route('xep-khoa-hoc')}}" class="nav-link" id='menu-xep-khoa-hoc'>
                <i class="far fa-calendar-alt nav-icon"></i>
                <p>Xếp khóa học</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link" id="menu-danh-muc">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Danh mục
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if(in_array('view_tai_khoan',session('quyen')))
            <li class="nav-item">
              <a href="{{route('tai-khoan')}}" class="nav-link" id='menu-tai-khoan'>
                <i class="fas fa-users nav-icon"></i>
                <p>Tài khoản</p>
              </a>
            </li>
            @endif
            @if(in_array('view_dan_toc',session('quyen')))
            <li class="nav-item">
              <a href="{{route('dm-dan-toc')}}" class="nav-link" id="menu-dm-danh-toc">
                <i class="far fa-address-book nav-icon"></i>
                <p>Dân tộc</p>
              </a>
            </li>
            @endif
            @if(in_array('view_don_vi',session('quyen')))
            <li class="nav-item">
              <a href="{{route('don-vi')}}" class="nav-link" id="menu-don-vi">
                <i class="far fa-building nav-icon"></i>
                <p>Đơn vị</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @if(session('nhom-quyen')=='admin')
        <li class="nav-item menu-open">
          <a href="#" class="nav-link" id="menu-phan-quyen">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Phân quyền
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('phan-nhom-quyen')}}" class="nav-link" id='menu-phan-nhom-quyen'>
                <i class="fas fa-users-cog nav-icon"></i>
                <p>Nhóm quyền</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('phan-quyen-user')}}" class="nav-link" id='menu-phan-quyen-user'>
                <i class="fas fa-user-cog nav-icon"></i>
                <p>Tài khoản</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
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
