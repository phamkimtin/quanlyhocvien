<table id="table-khoa-hoc" class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th class="text-center">STT</th>
			<th class="text-center">Mã khóa học</th>
			<th class="text-center">Tên khóa học</th>
			<th class="text-center">Từ năm</th>
			<th class="text-center">Đến năm</th>
			<th class="text-center">Trạng thái</th>
			@if(in_array('edit_khoa_hoc',session('quyen')))
			<th class="text-center">#</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($dsKhoaHoc as $index => $dsKH)
		<tr>
			<td class="text-center align-middle">{{$index+1}}</td>
			<td class="align-middle cell-khoa-hoc" data-id="{{$dsKH->ma_khoa_hoc}}" data-ten-khoa-hoc="{{$dsKH->ten_khoa_hoc}}" data-toggle="modal" data-target="#modal-danh-sach-hoc-vien">{{$dsKH->ma_khoa_hoc}}</td>
			<td class="align-middle">{{$dsKH->ten_khoa_hoc}}</td>
			<td class="text-center align-middle">{{$dsKH->tu_nam}}</td>
			<td class="text-center align-middle">{{$dsKH->den_nam}}</td>
			<td class="text-center align-middle">
				@if($dsKH->state==1)
				<span class="badge badge-success">Hoạt động</span>
				@else
				<span class="badge badge-danger">Ngừng hoạt động</span>
				@endif
			</td>
			@if(in_array('edit_khoa_hoc',session('quyen')))
			<td class="text-center">
				<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-hover dropdown-icon btn-xs" data-toggle="dropdown"><i class="fa fa-cogs"></i>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" role="menu">
						<a class="dropdown-item btn-sua-khoa-hoc" data-id="{{$dsKH->id}}" data-toggle="modal" data-target="#modal-sua-khoa-hoc">
							<i class="fas fa-pencil-alt"></i> Sửa
						</a>
						<a class="dropdown-item btn-xoa-khoa-hoc" data-id="{{$dsKH->id}}">
							<i class="fas fa-trash"></i> Xóa
						</a>
						<a class="dropdown-item btn-xem-mon-hoc" data-id="{{$dsKH->id}}" data-toggle="modal" data-target="#modal-xem-mon-hoc" data-ten-khoa-hoc="{{$dsKH->ten_khoa_hoc}}">
							<i class="fas fa-copy"></i> Xem môn học
						</a>
					</div>
				</div>
			</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>

@if(in_array('edit_khoa_hoc',session('quyen')))
<!-- modal sửa tài khoản -->
<div class="modal fade" id="modal-sua-khoa-hoc">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sửa khóa học</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">			
				<form action="javascript:void(0);">
					<input type="hidden" id="id-khoa-hoc-sua">
					<div class="form-group">
						<label for="ma-khoa-hoc-sua">Mã khóa học<b class="text-danger">(*)</b></label>
						<input type="text" id="ma-khoa-hoc-sua" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="ten-khoa-hoc-sua">Tên khóa học<b class="text-danger">(*)</b></label>
						<input type="text" id="ten-khoa-hoc-sua" class="form-control" required>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="tu-nam-sua">Từ năm</label>
							<input id="tu-nam-sua" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask>
						</div>
						<div class="form-group col-sm-6">
							<label for="den-nam-sua">Đến năm</label>
							<input id="den-nam-sua" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask>
						</div>
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

<!-- modal xem ds học viên -->
<div class="modal fade" id="modal-danh-sach-hoc-vien">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="tieu-de-danh-sach"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-striped table-sm">
					<thead>
						<tr>
							<th class="text-center">STT</th>
							<th class="text-center">Mã học viên</th>
							<th class="text-center">Tên học viên</th>
							<th class="text-center">Giới tính</th>
							<th class="text-center">SĐT</th>
							<th class="text-center">Đơn vị</th>
						</tr>
					</thead>
					<tbody id="div-dshv">
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal xem môn học -->
<div class="modal fade" id="modal-xem-mon-hoc">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="tieu-de-khoa-hoc"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="div-xem-mon-hoc"></div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
	$("#table-khoa-hoc").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
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

		@if(in_array('edit_khoa_hoc',session('quyen')))
    $( '<a class="btn btn-primary btn-them-khoa-hoc" style="width: 100px" data-toggle="modal" data-target="#modal-them-khoa-hoc"><i class="fas fa-plus"></i> Thêm</a>' ).appendTo( "#table-khoa-hoc_wrapper .col-md-6:eq(0)" );

    $('#tu-nam-sua').inputmask('yyyy', { 'placeholder': 'yyyy' });
    $('#den-nam-sua').inputmask('yyyy', { 'placeholder': 'yyyy' });

    $("#table-khoa-hoc").on("click", ".btn-xoa-khoa-hoc", function(){
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
    				url: '{{route("xoa-khoa-hoc")}}',
    				data: {
    					id:id
    				},
    				type: "POST",
    				headers: {
    					'X-CSRF-Token': '{{ csrf_token() }}',
    				},
    				success: function(data){
    					if(data==true){
    						toastr.success("Xóa khóa học thành công.");
    						$.ajax({
    							url: '{{route("load-danh-sach-khoa-hoc")}}',
    							type: "GET",
    							success: function(data){
    								$('#div-danh-sach-khoa-hoc').empty();
    								$('#div-danh-sach-khoa-hoc').html(data);
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

    $("#table-khoa-hoc").on("click", ".btn-sua-khoa-hoc", function(){
    	$('#modal-sua-khoa-hoc').find('form')[0].reset();
    	var id = $(this).attr('data-id');
    	$.ajax({
    		url: '{{route("load-khoa-hoc-sua")}}',
    		data: {
    			id:id
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(khoahoc){
    			$('#id-khoa-hoc-sua').val(id);
    			$('#ma-khoa-hoc-sua').val(khoahoc['ma_khoa_hoc']);
    			$('#ten-khoa-hoc-sua').val(khoahoc['ten_khoa_hoc']);
    			$('#tu-nam-sua').val(khoahoc['tu_nam']);
    			$('#den-nam-sua').val(khoahoc['den_nam']);
    			$('#trang-thai-sua').val(khoahoc['state']);
    		}, 
    		error: function(err){       
    			toastr.error("Lỗi! Vui lòng thử lại.");
    			console.log(err);
    		}
    	})
    });

    $('.btn-luu-sua').click(function(){
    	var idKhoaHocSua = $('#id-khoa-hoc-sua').val();
    	var maKhoaHocSua = $('#ma-khoa-hoc-sua').val();
    	var tenKhoaHocSua = $('#ten-khoa-hoc-sua').val();
    	var tuNamSua = $('#tu-nam-sua').val();
    	var denNamSua = $('#den-nam-sua').val();
    	var trangThaiSua = $('#trang-thai-sua').val();
    	$.ajax({
    		url: '{{route("luu-khoa-hoc-sua")}}',
    		data: {
    			idKhoaHocSua:idKhoaHocSua,
					maKhoaHocSua:maKhoaHocSua,
					tenKhoaHocSua:tenKhoaHocSua,
					tuNamSua:tuNamSua,
					denNamSua:denNamSua,
    			trangThaiSua:trangThaiSua
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(data){
    			if(data==true){
    				toastr.success("Cập nhật thông tin khóa học thành công."); 				
            $('#modal-sua-khoa-hoc').modal('hide');
    				$.ajax({
    					url: '{{route("load-danh-sach-khoa-hoc")}}',
    					type: "GET",
    					success: function(data){
    						$('#div-danh-sach-khoa-hoc').empty();
    						$('#div-danh-sach-khoa-hoc').html(data);
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
    $("#table-khoa-hoc").on("click", ".cell-khoa-hoc", function(){
    	$('#tieu-de-danh-sach').html($(this).attr('data-ten-khoa-hoc'));
    	var maKhoaHoc = $(this).attr('data-id');
    	$('#selected-khoa-hoc').val($(this).attr('data-id'));
    	$.ajax({
          url: '{{route("get-danh-sach-hoc-vien")}}',
          data: {
            maKhoaHoc:maKhoaHoc
          },
          type: "POST",
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          success: function(data){
          	$('#div-dshv').empty();
          	$('#div-dshv').html(data);
          }, 
          error: function(err){       
            toastr.error("Lỗi! Vui lòng thử lại.");
            console.log(err);
          }
        });
    });

    $("#table-khoa-hoc").on("click", ".btn-xem-mon-hoc", function(){
    	$('#tieu-de-khoa-hoc').html($(this).attr('data-ten-khoa-hoc'));
    	var idKhoaHoc = $(this).attr('data-id');
    	$.ajax({
        url: '{{route("xep-mon-hoc")}}',
        data: {
          idKhoaHoc:idKhoaHoc
        },
        type: "POST",
        headers: {
          'X-CSRF-Token': '{{ csrf_token() }}',
        },
        success: function(data){
        	$('#div-xem-mon-hoc').empty().html(data);
        }, 
        error: function(err){       
          toastr.error("Lỗi! Vui lòng thử lại.");
          console.log(err);
        }
      });
    });
</script>