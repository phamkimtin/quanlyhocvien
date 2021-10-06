@foreach($dsHocVien as $index => $hocVien)
<tr>
	<td class="align-middle text-center">{{$index+1}}</td>
	<td class="align-middle text-center">{{$hocVien->ma_hoc_vien}}</td>
	<td class="align-middle">{{$hocVien->hoten}}</td>
	<td class="align-middle">@if($hocVien->gioi_tinh=='nam') Nam @else Nữ @endif</td>
	<td class="align-middle">{{$hocVien->di_dong}}</td>
	<td class="align-middle">{{$hocVien->ten_don_vi}}</td>
</tr>
@endforeach