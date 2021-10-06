<table id="table-mon-hoc" class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên môn học</th>
			<th>Trạng thái</th>
			@if(in_array('edit_mon_hoc',session('quyen')))
			<th>Chức năng</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($dsMonHoc as $index => $dsMH)
		<tr>
			<td class="text-center align-middle">{{$index+1}}</td>
			<td class="align-middle">{{$dsMH->ten_mon_hoc}}</td>
			<td class="text-center align-middle">
				@if($dsMH->state==1)
				<span class="badge badge-success">Hoạt động</span>
				@else
				<span class="badge badge-danger">Ngừng hoạt động</span>
				@endif
			</td>
			@if(in_array('edit_mon_hoc',session('quyen')))
			<td class="text-center">
				<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon btn-xs" data-toggle="dropdown">Hành động
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" role="menu">
						<a class="dropdown-item btn-sua-mon-hoc" data-id="{{$dsMH->id}}" data-toggle="modal" data-target="#modal-sua-mon-hoc">
							<i class="fas fa-pencil-alt"></i> Sửa
						</a>
						<a class="dropdown-item btn-xoa-mon-hoc" data-id="{{$dsMH->id}}">
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

@if(in_array('edit_mon_hoc',session('quyen')))
<!-- modal sửa tài khoản -->
<div class="modal fade" id="modal-sua-mon-hoc">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sửa môn học</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">			
				<form action="javascript:void(0);">
					<input type="hidden" id="id-mon-hoc-sua">
					<div class="form-group">
						<label for="ten-mon-hoc-sua">Tên môn học <b class="text-danger">(*)</b></label>
						<input type="text" id="ten-mon-hoc-sua" class="form-control" required>
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
	$("#table-mon-hoc").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "paging": false,
      "ordering": false,
      "info": false,
      "stateSave": true,
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

		@if(in_array('edit_mon_hoc',session('quyen')))
    $( '<a class="btn btn-primary btn-them-mon-hoc" style="width: 100px" data-toggle="modal" data-target="#modal-them-mon-hoc"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#table-mon-hoc_wrapper .col-md-6:eq(0)" );

    $("#table-mon-hoc").on("click", ".btn-xoa-mon-hoc", function(){
    	var idMonHoc = $(this).attr('data-id');
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
    				url: '{{route("xoa-mon-hoc")}}',
    				data: {
    					idMonHoc:idMonHoc
    				},
    				type: "POST",
    				headers: {
    					'X-CSRF-Token': '{{ csrf_token() }}',
    				},
    				success: function(data){
    					if(data==true){
    						toastr.success("Xóa môn học thành công.");
    						$.ajax({
    							url: '{{route("load-danh-sach-mon-hoc")}}',
    							type: "GET",
    							success: function(data){
    								$('#div-danh-sach-mon-hoc').empty();
    								$('#div-danh-sach-mon-hoc').html(data);
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

    $("#table-mon-hoc").on("click", ".btn-sua-mon-hoc", function(){
    	$('#modal-sua-mon-hoc').find('form')[0].reset();
    	var idMonHoc = $(this).attr('data-id');
    	$.ajax({
    		url: '{{route("load-mon-hoc-sua")}}',
    		data: {
    			idMonHoc:idMonHoc
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(monhoc){
    			$('#id-mon-hoc-sua').val(idMonHoc);
    			$('#ten-mon-hoc-sua').val(monhoc['ten_mon_hoc']);
    			$('#trang-thai-sua').val(monhoc['state']);
    		}, 
    		error: function(err){       
    			toastr.error("Lỗi! Vui lòng thử lại.");
    			console.log(err);
    		}
    	})
    });

    $('.btn-luu-sua').click(function(){
    	var idMonHocSua = $('#id-mon-hoc-sua').val();
    	var tenMonHocSua = $('#ten-mon-hoc-sua').val();
    	var trangThaiSua = $('#trang-thai-sua').val();
    	$.ajax({
    		url: '{{route("luu-mon-hoc-sua")}}',
    		data: {
    			idMonHocSua:idMonHocSua,
    			tenMonHocSua:tenMonHocSua,
    			trangThaiSua:trangThaiSua
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(data){
    			if(data==true){
    				toastr.success("Cập nhật thông tin môn học thành công."); 				
            $('#modal-sua-mon-hoc').modal('hide');
    				$.ajax({
    					url: '{{route("load-danh-sach-mon-hoc")}}',
    					type: "GET",
    					success: function(data){
    						$('#div-danh-sach-mon-hoc').empty();
    						$('#div-danh-sach-mon-hoc').html(data);
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