<option value="-1" selected>Tất cả</option>
@foreach($dsKhoaHoc as $khoaHoc)
<option value="{{$khoaHoc['ma_khoa_hoc']}}">{{$khoaHoc['ten_khoa_hoc']}}</option>
@endforeach