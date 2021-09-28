@php 
use App\Http\Controllers\HocVienController; 
use App\Http\Controllers\DanTocController; 
use App\Http\Controllers\DonViController; 
use App\Http\Controllers\KhoaHocController;
@endphp
<table id="table-hoc-vien" class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th>STT</th>
			<th>Mã học viên</th>
			<th>Họ tên</th>
			<th>Tài khoản</th>
			<th>Giới tính</th>
			<th>Năm sinh</th>
			<th>Nơi sinh</th>
			<th>Chức vụ Đảng</th>
			<th>Chức vụ CQ</th>
			<th>Dân tộc</th>
			<th>Đơn vị</th>
			<th>Khóa học</th>
			<th>Di động</th>
			<th>Trạng thái</th>
			@if(in_array('edit_hoc_vien',session('quyen')))
			<th>Chức năng</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($dsUser as $index => $user)
		@php
		$hocVien = HocVienController::getHvByIduser($user->id);
		@endphp
		<tr>
			<td class="text-center align-middle">{{$index+1}}</td>
			<td class="align-middle">{{$hocVien->ma_hoc_vien}}</td>
			<td class="align-middle">{{$user->hoten}}</td>
			<td class="align-middle">{{$user->username}}</td>
			<td class="align-middle">@if($user->gioi_tinh=='nam') Nam @else Nữ @endif</td>
			<td class="align-middle">{{$hocVien->nam_sinh}}</td>
			<td class="align-middle">{{$hocVien->noi_sinh}}</td>
			<td class="align-middle">{{$hocVien->chuc_vu_dang}}</td>
			<td class="align-middle">{{$hocVien->chuc_vu_chinh_quyen}}</td>
			@php $danToc = DanTocController::getDanTocByMa($hocVien->ma_dan_toc); @endphp
			<td class="align-middle">{{$danToc->ten_dan_toc}}</td>
			@php $donVi = DonViController::getDonViByMa($hocVien->ma_don_vi); @endphp
			<td class="align-middle">{{$donVi->ten_don_vi}}</td>
			<td class="align-middle">{{$hocVien->ma_khoa_hoc}}</td>
			<td class="align-middle">{{$user->di_dong}}</td>
			<td class="text-center align-middle">
				@if($hocVien->state==1)
				<span class="badge badge-success">Chính thức</span>
				@else
				<span class="badge badge-danger">Chờ duyệt</span>
				@endif
			</td>
			@if(in_array('edit_hoc_vien',session('quyen')))
			<td class="text-center">
				<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon btn-xs" data-toggle="dropdown">Hành động
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" role="menu">
						<a class="dropdown-item btn-sua-hoc-vien" data-id="{{$user->id}}" data-toggle="modal" data-target="#modal-sua-hoc-vien">
							<i class="fas fa-pencil-alt"></i> Sửa
						</a>
						<a class="dropdown-item btn-xoa-hoc-vien" data-id="{{$user->id}}">
							<i class="fas fa-trash"></i> Xóa
						</a>
					</div>
				</div>
			</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>

@if(in_array('edit_hoc_vien',session('quyen')))
<!-- modal sửa tài khoản -->
<div class="modal fade" id="modal-sua-tai-khoan">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sửa tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">			
				<form action="javascript:void(0);">
					<input type="hidden" id="id-tai-khoan-sua">
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="ho-ten-sua">Họ tên <b class="text-danger">(*)</b></label>
							<input type="text" id="ho-ten-sua" class="form-control" required>
						</div>
						<div class="form-group col-sm-6">
							<label for="gioi-tinh-sua">Giới tính <b class="text-danger">(*)</b></label>
							<select id="gioi-tinh-sua" class="form-control custom-select" required>
								<option value="" disabled>Vui lòng chọn</option>
								<option value="nam">Nam</option>
								<option value="nu">Nữ</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="tai-khoan-sua">Tài khoản <b class="text-danger">(*)</b></label>
							<input type="text" id="tai-khoan-sua" class="form-control" disabled>
						</div>
						<div class="form-group col-sm-6">
							<label for="mat-khau-sua">Mật khẩu</label>
							<input type="text" id="mat-khau-sua" class="form-control" placeholder="Để trống nếu không thay đổi mật khẩu">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="di-dong-sua">Di động</label>
							<input type="tel" id="di-dong-sua" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="trang-thai-sua">Trạng thái <b class="text-danger">(*)</b></label>
						<select id="trang-thai-sua" class="form-control custom-select">
							<option value="1">Hoạt động</option>
							<option value="0">Ngừng hoạt động</option>
						</select>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
						<button type="submit" class="btn btn-primary btn-luu-sua">Lưu lại</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endif

<script type="text/javascript">
	$("#table-hoc-vien").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "pageLength": 50,
      "ordering": false,
      "language": {
        "lengthMenu": "Display _MENU_ records per page",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Trang _PAGE_ trên _PAGES_",
        "infoEmpty": "Không có dữ liệu",
        "infoFiltered": "(lọc từ _MAX_ dòng)",
        "search": "Tìm kiếm:",
        "paginate": {
          "first":      "Đầu",
          "last":       "Cuối",
          "next":       "Sau",
          "previous":   "Trước"
        },
      }
    });

		@if(in_array('edit_hoc_vien',session('quyen')))
    $( '<a class="btn btn-primary btn-them-hoc-vien" style="width: 100px" data-toggle="modal" data-target="#modal-them-hoc-vien"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#table-hoc-vien_wrapper .col-md-6:eq(0)" );
    $( '<a class="btn btn-success btn-import-hoc-vien" style="width: 100px; margin-left: 5px" data-toggle="modal" data-target="#modal-import-hoc-vien"><i class="fas fa-file"></i> Import</a>' ).appendTo( "#table-hoc-vien_wrapper .col-md-6:eq(0)" );

    $("#table-tai-khoan").on("click", ".btn-xoa-tai-khoan", function(){
    	var idTaiKhoan = $(this).attr('data-id');
    	Swal.fire({
    		title: 'Xác nhận xóa?',
    		text: "Lưu ý! Dữ liệu đã xóa không thể khôi phục lại!",
    		icon: 'warning',
    		showCancelButton: true,
    		confirmButtonColor: '#3085d6',
    		cancelButtonColor: '#d33',
    		confirmButtonText: 'Xóa',
    		cancelButtonText: 'Hủy',
    	}).then((result) => {
    		if (result.isConfirmed) {
    			$.ajax({
    				url: '{{route("xoa-tai-khoan")}}',
    				data: {
    					idTaiKhoan:idTaiKhoan
    				},
    				type: "POST",
    				headers: {
    					'X-CSRF-Token': '{{ csrf_token() }}',
    				},
    				success: function(data){
    					if(data==true){
    						toastr.success("Xóa tài khoản thành công.");
    						$.ajax({
    							url: '{{route("load-danh-sach-tai-khoan")}}',
    							type: "GET",
    							success: function(data){
    								$('#div-danh-sach-tai-khoan').empty();
    								$('#div-danh-sach-tai-khoan').html(data);
    							}, 
    							error: function(err){       
    								toastr.error("Lỗi! Vui lòng thử lại.");
    								console.log(err);
    							}
    						})
    					}
    				}, 
    				error: function(err){       
    					toastr.error("Lỗi! Vui lòng thử lại.");
    					console.log(err);
    				}
    			});
    		}
    	})
    });

    $("#table-tai-khoan").on("click", ".btn-sua-tai-khoan", function(){
    	$('#modal-sua-tai-khoan').find('form')[0].reset();
    	var idTaiKhoan = $(this).attr('data-id');
    	$.ajax({
    		url: '{{route("load-tai-khoan-sua")}}',
    		data: {
    			idTaiKhoan:idTaiKhoan
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(taikhoan){
    			$('#id-tai-khoan-sua').val(idTaiKhoan);
    			$('#ho-ten-sua').val(taikhoan['hoten']);
    			$('#gioi-tinh-sua').val(taikhoan['gioi_tinh']);
    			$('#tai-khoan-sua').val(taikhoan['username']);
    			$('#di-dong-sua').val(taikhoan['di_dong']);
    			$('#nhom-quyen-sua').val(taikhoan['nhom_quyen']);
    			$('#trang-thai-sua').val(taikhoan['state']);
    		}, 
    		error: function(err){       
    			toastr.error("Lỗi! Vui lòng thử lại.");
    			console.log(err);
    		}
    	})
    });

    $('.btn-luu-sua').click(function(){
    	var idTaiKhoanSua = $('#id-tai-khoan-sua').val();
    	var hoTenSua = $('#ho-ten-sua').val();
    	var matKhauSua = $('#mat-khau-sua').val();
    	var gioiTinhSua = $('#gioi-tinh-sua').val();
    	var diDongSua = $('#di-dong-sua').val();
    	var nhomQuyenSua = $('#nhom-quyen-sua').val();
    	var trangThaiSua = $('#trang-thai-sua').val();
    	$.ajax({
    		url: '{{route("luu-tai-khoan-sua")}}',
    		data: {
    			idTaiKhoanSua:idTaiKhoanSua,
    			hoTenSua:hoTenSua,
    			matKhauSua:matKhauSua,
    			gioiTinhSua:gioiTinhSua,
    			diDongSua:diDongSua,
    			nhomQuyenSua:nhomQuyenSua,
    			trangThaiSua:trangThaiSua
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(data){
    			if(data==true){
    				toastr.success("Cập nhật thông tin tài khoản thành công."); 				
            $('#modal-sua-tai-khoan').modal('hide');
    				$.ajax({
    					url: '{{route("load-danh-sach-tai-khoan")}}',
    					type: "GET",
    					success: function(data){
    						$('#div-danh-sach-tai-khoan').empty();
    						$('#div-danh-sach-tai-khoan').html(data);
    					}, 
    					error: function(err){       
    						toastr.error("Lỗi! Vui lòng thử lại.");
    						console.log(err);
    					}
    				})
    			}
    			else{
    				toastr.error("Lỗi! Vui lòng thử lại.");
    				console.log(data);
    			}
    		}, 
    		error: function(err){       
    			toastr.error("Lỗi! Vui lòng thử lại.");
    			console.log(err);
    		}
    	})
    });
    @endif
</script>