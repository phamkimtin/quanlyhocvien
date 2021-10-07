@php use App\Http\Controllers\XepMonHocController; @endphp
<table class="table table-bordered table-striped table-sm">
  <thead>
    <tr>
      <th class="text-center">STT</th>
      <th class="text-center">Mã học viên</th>
      <th class="text-center">Tên học viên</th>
      <th class="text-center">Giới tính</th>
      <th class="text-center">SĐT</th>
      <th class="text-center">Đơn vị</th>
    </tr>
  </thead>
  <tbody>
    @if(count($dsHocVienTrongKhoa)==0)
    <tr>
      <td class="align-middle text-center" colspan="3">Chưa có học viên trong khóa</td>

    </tr>
    @else
      @foreach($dsHocVienTrongKhoa as $index => $hocVienTrongKhoa)
      <tr>
        <td class="align-middle text-center">{{$index+1}}</td>
        <td class="align-middle">{{$hocVienTrongKhoa->ma_hoc_vien}}</td>
        <td class="align-middle">{{$hocVienTrongKhoa->hoten}}</td>
        <td class="align-middle">@if($hocVienTrongKhoa->gioi_tinh == 'nam') Nam @else Nữ @endif</td>
        <td class="align-middle">{{$hocVienTrongKhoa->di_dong}}</td>
        <td class="align-middle">{{$hocVienTrongKhoa->ten_don_vi}}</td>
      </tr>
      @endforeach
    @endif
  </tbody>
</table>
<div class="card card-info">
  <div class="card-header">
    <h4 class="card-title">Thêm học viên vào khóa</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <div class="row">
            <div class="text-left col-sm-6 text-bold">Danh sách học viên chưa có khóa</div>
            <div class="text-right col-sm-6 text-bold">Danh sách học viên trong khóa</div>
          </div>
          <select class="duallistbox" multiple="multiple">
            @foreach($dsHocVienTrongKhoa as $hocVienTrongKhoa)
            <option value="{{$hocVienTrongKhoa->id_user}}" selected>{{$hocVienTrongKhoa->hoten}} - {{$hocVienTrongKhoa->ma_hoc_vien}} - {{$hocVienTrongKhoa->ten_don_vi}}</option>
            @endforeach
            @foreach($dsHocVien as $hocVien)
            <option value="{{$hocVien->id_user}}">{{$hocVien->hoten}} - {{$hocVien->ma_hoc_vien}} - {{$hocVien->ten_don_vi}}</option>
            @endforeach
          </select>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <div class="text-right">
      <button class="btn btn-success btn-luu-xep-hoc-vien w-25">Lưu</button>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function () {
    // Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox({
      infoText: 'Tổng số {0} học viên',
      filterPlaceHolder: 'Tìm kiếm',
      infoTextFiltered: '<span class="badge badge-warning">Tìm thấy</span> {0} từ {1} học viên',
      filterTextClear: 'Hiển thị tất cả',
      infoTextEmpty: 'Danh sách trống',
      selectorMinimalHeight: 200
    });

    $('.btn-luu-xep-hoc-vien').on('click', function(){
      var idKhoaHoc = '{{$idKhoaHoc}}';
      var dsHocVien = $('.duallistbox').val();
      $.ajax({
        url: '{{route("luu-xep-hoc-vien")}}',
        data: {
          idKhoaHoc:idKhoaHoc,
          dsHocVien:dsHocVien
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){    
          if(data==true){
            toastr.success("Lưu thành công.");
            $.ajax({
              url: '{{route("xep-hoc-vien")}}',
              data: {
                idKhoaHoc:idKhoaHoc
              },
              type: "POST",
              headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
              },
              success: function(data){
                $('#div-xem-hoc-vien').empty().html(data);
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
    });
  });
</script>