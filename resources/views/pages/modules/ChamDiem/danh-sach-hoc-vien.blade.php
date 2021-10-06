<div class="table-responsive p-0" style="height: 100%">
  <table id="table-ds-hoc-vien" class="table table-bordered table-sm table-head-fixed text-nowrap" style="height: calc(100% - 140px);">
    <thead>
      <tr>
        <th class="text-center" width="5%">STT</th>
        <th class="text-center" width="15%">Mã học viên</th>
        <th class="text-center" width="25%">Họ tên</th>
        <th class="text-center" width="40%">Đơn vị</th>
        <th class="text-center" width="80px">Điểm</th>
        <th class="text-center" width="100px">Xếp loại</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dsHocVien as $index => $dsHV)
      <tr>
        <td class="text-center align-middle text-bold">{{$index+1}}</td>
        <td class="align-middle text-bold">{{$dsHV->ma_hoc_vien}}</td>
        <td class="align-middle text-bold">{{$dsHV->hoten}}</td>
        <td class="align-middle text-bold">{{$dsHV->ten_don_vi}}</td>
        <td colspan="2"></td>
      </tr>
      @foreach($dsMonHoc as $index2 => $dsMH)
      <tr>
        @if($index2==0) <td rowspan="{{count($dsMonHoc)}}"></td> @endif
        <td class="align-middle" colspan="3">{{$dsMH->ten_mon_hoc}}</td>
        <td><input type="number" min="0" class="form-control form-control-sm diem-thi" data-id-mon-hoc="{{$dsMH->id}}" data-id-hoc-vien="{{$dsHV->id_user}}"></td>
        <td><input type="text" class="form-control form-control-sm xep-loai" data-id-mon-hoc="{{$dsMH->id}}" data-id-hoc-vien="{{$dsHV->id_user}}"></td>
      </tr>
      @endforeach
      @endforeach
    </tbody>
  </table>
</div>
<script type="text/javascript">
  $('.diem-thi').on('change',function(){
    var idHocVien = $(this).attr('data-id-hoc-vien');
    var idMonHoc = $(this).attr('data-id-mon-hoc');
    alert(idHocVien+'--'+idMonHoc);
  });
</script>