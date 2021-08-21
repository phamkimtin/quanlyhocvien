<table id="table-dan-toc" class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th>STT</th>
			<th>Mã dân tộc</th>
			<th>Tên dân tộc</th>
			<th>Trạng thái</th>
			<th>Chức năng</th>
		</tr>
	</thead>
	<tbody>
		@foreach($dsDanToc as $index => $dsDT)
		<tr>
			<td class="text-center align-middle">{{$index+1}}</td>
			<td class="align-middle">{{$dsDT->ma_dan_toc}}</td>
			<td class="align-middle">{{$dsDT->ten_dan_toc}}</td>
			<td class="text-center align-middle">
				@if($dsDT->state==1)
				<span class="badge badge-success">Hoạt động</span>
				@else
				<span class="badge badge-danger">Ngừng hoạt động</span>
				@endif
			</td>
			<td class="text-center">
				<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon btn-xs" data-toggle="dropdown">Hành động
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" role="menu">
						<a class="dropdown-item btn-sua-dan-toc" data-id="{{$dsDT->id}}" data-toggle="modal" data-target="#modal-sua-dan-toc">
							<i class="fas fa-pencil-alt"></i> Sửa
						</a>
						<a class="dropdown-item btn-xoa-dan-toc" data-id="{{$dsDT->id}}">
							<i class="fas fa-trash"></i> Xóa
						</a>
					</div>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

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
						<div class="form-group col-sm-6">
							<label for="nhom-quyen-sua">Nhóm quyền <b class="text-danger">(*)</b></label>
							<select id="nhom-quyen-sua" class="form-control custom-select" required>
								<option value="" disabled>Vui lòng chọn</option>
								<option value="quan_tri">Quản trị</option>
								<option value="nguoi_dung">Người dùng</option>
							</select>
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
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

<script type="text/javascript">
	$("#table-dan-toc").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
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

    $( '<a class="btn btn-primary btn-sua-dan-toc" style="width: 100px" data-toggle="modal" data-target="#modal-sua-dan-toc"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#table-dan-toc_wrapper .col-md-6:eq(0)" );

    $('.btn-xoa-tai-khoan').click(function(){
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

    $('.btn-sua-tai-khoan').click(function(){
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

</script>