<option value="" selected disabled>Chọn khóa học</option>
@foreach($dsKhoaHoc as $khoaHoc)
<option value="{{$khoaHoc['ma_khoa_hoc']}}">{{$khoaHoc['ten_khoa_hoc']}}</option>
@endforeach