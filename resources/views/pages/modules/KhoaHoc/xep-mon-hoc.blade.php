@php use App\Http\Controllers\XepMonHocController; @endphp
<table class="table table-bordered table-striped table-sm">
  <thead>
    <tr>
      <th class="text-center">STT</th>
      <th class="text-center">Tên môn học</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    @if(count($dsMonHocTrongKhoa)==0)
    <tr>
      <td class="align-middle text-center" colspan="3">Chưa có môn học trong khóa</td>

    </tr>
    @else
      @foreach($dsMonHocTrongKhoa as $index => $monHocTrongKhoa)
      <tr>
        <td class="align-middle text-center">{{$index+1}}</td>
        <td class="align-middle">{{$monHocTrongKhoa->ten_mon_hoc}}</td>
        <td></td>
      </tr>
      @endforeach
    @endif
  </tbody>
</table>
<div class="card card-info">
  <div class="card-header">
    <h4 class="card-title">Thêm môn học vào khóa</h4>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <div class="row">
            <div class="text-left col-sm-6 text-bold">Danh sách môn học</div>
            <div class="text-right col-sm-6 text-bold">Danh sách môn học trong khóa</div>
          </div>
          <select class="duallistbox" multiple="multiple">
            @foreach($dsMonHoc as $monHoc)
              @php $check = XepMonHocController::checkCoMonHoc($idKhoaHoc,$monHoc->id);@endphp
            <option value="{{$monHoc->id}}" @if($check>0) selected @endif>{{$monHoc->ten_mon_hoc}}</option>
            @endforeach
          </select>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <div class="text-right">
      <button class="btn btn-success btn-luu-xep-mon-hoc w-25">Lưu</button>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function () {
    // Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox({
      infoText: 'Tổng số {0} môn học',
      filterPlaceHolder: 'Tìm kiếm',
      infoTextFiltered: '<span class="badge badge-warning">Tìm thấy</span> {0} từ {1} môn học',
      filterTextClear: 'Hiển thị tất cả',
      infoTextEmpty: 'Danh sách trống',
      selectorMinimalHeight: 200
    });

    $('.btn-luu-xep-mon-hoc').on('click', function(){
      var idKhoaHoc = '{{$idKhoaHoc}}';
      var dsMonHoc = $('.duallistbox').val();
      $.ajax({
        url: '{{route("luu-xep-mon-hoc")}}',
        data: {
          idKhoaHoc:idKhoaHoc,
          dsMonHoc:dsMonHoc
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){    
          if(data==true){
            toastr.success("Lưu thành công.");
            $.ajax({
              url: '{{route("xep-mon-hoc")}}',
              data: {
                idKhoaHoc:idKhoaHoc
              },
              type: "POST",
              headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
              },
              success: function(data){
                $('#div-xem-mon-hoc').empty().html(data);
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