<option value="" selected disabled>Chọn khóa học</option>
@foreach($dsKhoaHoc as $khoaHoc)
<option value="{{$khoaHoc['id']}}">{{$khoaHoc['ten_khoa_hoc']}}</option>
@endforeach