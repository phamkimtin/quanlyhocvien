<table id="table-dan-toc" class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th>STT</th>
			<th>Mã dân tộc</th>
			<th>Tên dân tộc</th>
			<th>Trạng thái</th>
			@if(in_array('edit_dan_toc',session('quyen')))
			<th>Chức năng</th>
			@endif
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
			@if(in_array('edit_dan_toc',session('quyen')))
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
			@endif
		</tr>
		@endforeach
	</tbody>
</table>

@if(in_array('edit_dan_toc',session('quyen')))
<!-- modal sửa dân tộc -->
<div class="modal fade" id="modal-sua-dan-toc">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sửa dân tộc</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">			
				<form action="javascript:void(0);">
					<input type="hidden" id="id-dan-toc-sua">
					<div class="form-group">
            <label for="ma-dan-toc-sua">Mã dân tộc<b class="text-danger">(*)</b></label>
            <input type="text" id="ma-dan-toc-sua" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="ten-dan-toc-sua">Tên dân tộc<b class="text-danger">(*)</b></label>
            <input type="text" id="ten-dan-toc-sua" class="form-control" required>
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

	@if(in_array('edit_dan_toc',session('quyen')))
	$( '<a class="btn btn-primary btn-them-dan-toc" style="width: 100px" data-toggle="modal" data-target="#modal-them-dan-toc"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#table-dan-toc_wrapper .col-md-6:eq(0)" );


	$("#table-dan-toc").on("click", ".btn-xoa-dan-toc", function(){
		var idDanToc = $(this).attr('data-id');
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
					url: '{{route("xoa-dan-toc")}}',
					data: {
						idDanToc:idDanToc
					},
					type: "POST",
					headers: {
						'X-CSRF-Token': '{{ csrf_token() }}',
					},
					success: function(data){
						if(data==true){
							toastr.success("Xóa dân tộc thành công.");
							$.ajax({
								url: '{{route("load-danh-sach-dan-toc")}}',
								type: "GET",
								success: function(data){
									$('#div-danh-sach-dan-toc').empty();
									$('#div-danh-sach-dan-toc').html(data);
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
	$("#table-dan-toc").on("click", ".btn-sua-dan-toc", function(){
		$('#modal-sua-dan-toc').find('form')[0].reset();
		var idDanToc = $(this).attr('data-id');
		$.ajax({
			url: '{{route("load-dan-toc-sua")}}',
			data: {
				idDanToc:idDanToc
			},
			type: "POST",
			headers: {
				'X-CSRF-Token': '{{ csrf_token() }}',
			},
			success: function(dantoc){
				$('#id-dan-toc-sua').val(idDanToc);
				$('#ma-dan-toc-sua').val(dantoc['ma_dan_toc']);
				$('#ten-dan-toc-sua').val(dantoc['ten_dan_toc']);
				$('#trang-thai-sua').val(dantoc['state']);
			}, 
			error: function(err){       
				toastr.error("Lỗi! Vui lòng thử lại.");
				console.log(err);
			}
		})
	});

	$(".btn-luu-sua").on("click", function(){
		var idDanTocSua = $('#id-dan-toc-sua').val();
		var maDanTocSua = $('#ma-dan-toc-sua').val();
		var tenDanTocSua = $('#ten-dan-toc-sua').val();
		var trangThaiSua = $('#trang-thai-sua').val();
		$.ajax({
			url: '{{route("luu-dan-toc-sua")}}',
			data: {
				idDanTocSua:idDanTocSua,
				maDanTocSua:maDanTocSua,
				tenDanTocSua:tenDanTocSua,
				trangThaiSua:trangThaiSua
			},
			type: "POST",
			headers: {
				'X-CSRF-Token': '{{ csrf_token() }}',
			},
			success: function(data){
				if(data==true){
					toastr.success("Cập nhật thông tin dân tộc thành công."); 				
					$('#modal-sua-dan-toc').modal('hide');
					$.ajax({
						url: '{{route("load-danh-sach-dan-toc")}}',
						type: "GET",
						success: function(data){
							$('#div-danh-sach-dan-toc').empty();
							$('#div-danh-sach-dan-toc').html(data);
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