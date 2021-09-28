<table id="table-don-vi" class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th>STT</th>
			<th>Mã đơn vị</th>
			<th>Tên đơn vị</th>
			<th>Trạng thái</th>
			@if(in_array('edit_don_vi',session('quyen')))
			<th>Chức năng</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($dsDonVi as $index => $dsDV)
		<tr>
			<td class="text-center align-middle">{{$index+1}}</td>
			<td class="align-middle">{{$dsDV->ma_don_vi}}</td>
			<td class="align-middle">{{$dsDV->ten_don_vi}}</td>
			<td class="text-center align-middle">
				@if($dsDV->state==1)
				<span class="badge badge-success">Hoạt động</span>
				@else
				<span class="badge badge-danger">Ngừng hoạt động</span>
				@endif
			</td>
			@if(in_array('edit_don_vi',session('quyen')))
			<td class="text-center">
				<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon btn-xs" data-toggle="dropdown">Hành động
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" role="menu">
						<a class="dropdown-item btn-sua-don-vi" data-id="{{$dsDV->id}}" data-toggle="modal" data-target="#modal-sua-don-vi">
							<i class="fas fa-pencil-alt"></i> Sửa
						</a>
						<a class="dropdown-item btn-xoa-don-vi" data-id="{{$dsDV->id}}">
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

@if(in_array('edit_don_vi',session('quyen')))
<!-- modal sửa đơn vị -->
<div class="modal fade" id="modal-sua-don-vi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sửa đơn vị</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">			
				<form action="javascript:void(0);">
					<input type="hidden" id="id-don-vi-sua">
					<div class="form-group">
						<label for="ma-don-vi-sua">Mã đơn vị<b class="text-danger">(*)</b></label>
						<input type="text" id="ma-don-vi-sua" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="ten-don-vi-sua">Tên đơn vị<b class="text-danger">(*)</b></label>
						<input type="text" id="ten-don-vi-sua" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="trang-thai-sua">Trạng thái <b class="text-danger">(*)</b></label>
						<select id="trang-thai-sua" class="form-control custom-select">
							<option value="1" selected>Hoạt động</option>
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
	$("#table-don-vi").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "language": {
        "lengthMenu": "Hiển thị _MENU_ dòng trên trang",
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

		@if(in_array('edit_don_vi',session('quyen')))
    $( '<a class="btn btn-primary btn-them-don-vi" style="width: 100px" data-toggle="modal" data-target="#modal-them-don-vi"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#table-don-vi_wrapper .col-md-6:eq(0)" );

    $("#table-don-vi").on("click", ".btn-xoa-don-vi", function(){
    	var id = $(this).attr('data-id');
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
    				url: '{{route("xoa-don-vi")}}',
    				data: {
    					id:id
    				},
    				type: "POST",
    				headers: {
    					'X-CSRF-Token': '{{ csrf_token() }}',
    				},
    				success: function(data){
    					if(data==true){
    						toastr.success("Xóa đơn vị thành công.");
    						$.ajax({
    							url: '{{route("load-danh-sach-don-vi")}}',
    							type: "GET",
    							success: function(data){
    								$('#div-danh-sach-don-vi').empty();
    								$('#div-danh-sach-don-vi').html(data);
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

    $("#table-don-vi").on("click", ".btn-sua-don-vi", function(){
    	$('#modal-sua-don-vi').find('form')[0].reset();
    	var id = $(this).attr('data-id');
    	$.ajax({
    		url: '{{route("load-don-vi-sua")}}',
    		data: {
    			id:id
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(donvi){
    			$('#id-don-vi-sua').val(id);
    			$('#ma-don-vi-sua').val(donvi['ma_don_vi']);
    			$('#ten-don-vi-sua').val(donvi['ten_don_vi']);
    			$('#trang-thai-sua').val(donvi['state']);
    		}, 
    		error: function(err){       
    			toastr.error("Lỗi! Vui lòng thử lại.");
    			console.log(err);
    		}
    	})
    });

    $('.btn-luu-sua').click(function(){
    	var idDonViSua = $('#id-don-vi-sua').val();
    	var maDonViSua = $('#ma-don-vi-sua').val();
    	var tenDonViSua = $('#ten-don-vi-sua').val();
    	var trangThaiSua = $('#trang-thai-sua').val();
    	$.ajax({
    		url: '{{route("luu-don-vi-sua")}}',
    		data: {
    			idDonViSua:idDonViSua,
					maDonViSua:maDonViSua,
					tenDonViSua:tenDonViSua,
    			trangThaiSua:trangThaiSua
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(data){
    			if(data==true){
    				toastr.success("Cập nhật thông tin đơn vị thành công."); 				
            $('#modal-sua-don-vi').modal('hide');
    				$.ajax({
    					url: '{{route("load-danh-sach-don-vi")}}',
    					type: "GET",
    					success: function(data){
    						$('#div-danh-sach-don-vi').empty();
    						$('#div-danh-sach-don-vi').html(data);
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