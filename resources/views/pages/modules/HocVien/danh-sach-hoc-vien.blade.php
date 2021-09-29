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
			<td class="align-middle">@if($hocVien->ma_khoa_hoc=='0')Chưa có khóa học @else {{$hocVien->ma_khoa_hoc}} @endif</td>
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
					<button type="button" class="btn btn-info dropdown-hover dropdown-icon btn-xs" data-toggle="dropdown"><i class="fa fa-cogs"></i>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right" role="menu">
						<a class="dropdown-item btn-sua-hoc-vien" data-id="{{$user->id}}" data-toggle="modal" data-target="#modal-sua-hoc-vien">
							<i class="fas fa-pencil-alt"></i> Sửa
						</a>
						<a class="dropdown-item btn-xoa-hoc-vien" data-id="{{$user->id}}">
							<i class="fas fa-trash"></i> Xóa
						</a>
						<a class="dropdown-item btn-duyet-hoc-vien" data-id="{{$user->id}}">
							<i class="fas fa-check-circle"></i> Duyệt nhanh
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
<!-- modal sửa học viên -->
<div class="modal fade" id="modal-sua-hoc-vien">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sửa học viên</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">			
				<form action="javascript:void(0);">
					<input type="hidden" id="id-tai-khoan-sua">
					<div class="row">
            <div class="form-group col-sm-4">
              <label for="ma-hoc-vien-sua">Mã học viên <b class="text-danger">(*)</b></label>
              <input type="text" id="ma-hoc-vien-sua" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="ho-ten-sua">Họ tên <b class="text-danger">(*)</b></label>
              <input type="text" id="ho-ten-sua" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="gioi-tinh-sua">Giới tính <b class="text-danger">(*)</b></label>
              <select id="gioi-tinh-sua" class="form-control custom-select" required>
                <option value="" disabled>Vui lòng chọn</option>
                <option value="nam">Nam</option>
                <option value="nu">Nữ</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="nam-sinh-sua">Năm sinh</label>
              <input type="text" id="nam-sinh-sua" class="form-control">
            </div>
            <div class="form-group col-sm-4">
              <label for="noi-sinh-sua">Nơi sinh </label>
              <input type="text" id="noi-sinh-sua" class="form-control">
            </div>
            <div class="form-group col-sm-4">
              <label for="di-dong-sua">Di động </label>
              <input type="text" id="di-dong-sua" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="chuc-vu-dang-sua">Chức vụ Đảng</label>
              <input type="text" id="chuc-vu-dang-sua" class="form-control">
            </div>
            <div class="form-group col-sm-4">
              <label for="chuc-vu-chinh-quyen-sua">Chức vụ Chính quyền</label>
              <input type="text" id="chuc-vu-chinh-quyen-sua" class="form-control">
            </div>
            @php
            $dsDanToc = DanTocController::getDsDanToc();
            @endphp
            <div class="form-group col-sm-4">
              <label for="dan-toc-sua">Dân tộc <b class="text-danger">(*)</b></label>
              <select id="dan-toc-sua" class="form-control custom-select" required>
                <option value="" selected disabled>Vui lòng chọn</option>
                @foreach($dsDanToc as $danToc)
                <option value="{{$danToc->ma_dan_toc}}">{{$danToc->ten_dan_toc}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            @php
            $dsDonVi = DonViController::getDsDonVi();
            @endphp
            <div class="form-group col-sm-6">
              <label for="don-vi-sua">Đơn vị <b class="text-danger">(*)</b></label>
              <select id="don-vi-sua" class="form-control custom-select" required>
                <option value="" selected disabled>Vui lòng chọn</option>
                @foreach($dsDonVi as $donVi)
                <option value="{{$donVi->ma_don_vi}}">{{$donVi->ten_don_vi}}</option>
                @endforeach
              </select>
            </div>
            @php
            $dsKhoaHoc = KhoaHocController::getDsKhoaHoc();
            @endphp
            <div class="form-group col-sm-6">
              <label for="khoa-hoc-sua">Khóa học <b class="text-danger">(*)</b></label>
              <select id="khoa-hoc-sua" class="form-control custom-select" required>
                <option value="0" selected>Chưa có khóa học</option>
                @foreach($dsKhoaHoc as $khoaHoc)
                <option value="{{$khoaHoc->ma_khoa_hoc}}">{{$khoaHoc->ten_khoa_hoc}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="tai-khoan-sua">Tài khoản <b class="text-danger">(*)</b></label>
              <input type="text" id="tai-khoan-sua" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="mat-khau-sua">Mật khẩu</b></label>
              <input type="text" id="mat-khau-sua" class="form-control" placeholder="Để trống nếu không thay đổi mật khẩu" value="">
            </div>
            <div class="form-group col-sm-4">
              <label for="trang-thai-sua">Trạng thái <b class="text-danger">(*)</b></label>
              <select id="trang-thai-sua" class="form-control custom-select">
                <option value="0" selected>Chờ duyệt</option>
                <option value="1">Chính thức</option>
              </select>
            </div>
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

    $("#table-hoc-vien").on("click", ".btn-xoa-hoc-vien", function(){
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
    				url: '{{route("xoa-hoc-vien")}}',
    				data: {
    					idTaiKhoan:idTaiKhoan
    				},
    				type: "POST",
    				headers: {
    					'X-CSRF-Token': '{{ csrf_token() }}',
    				},
    				success: function(data){
    					if(data==true){
    						toastr.success("Xóa học viên thành công.");
    						$.ajax({
    							url: '{{route("load-danh-sach-hoc-vien")}}',
    							type: "GET",
    							success: function(data){
    								$('#div-danh-sach-hoc-vien').empty();
    								$('#div-danh-sach-hoc-vien').html(data);
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

    $("#table-hoc-vien").on("click", ".btn-sua-hoc-vien", function(){
    	$('#modal-sua-hoc-vien').find('form')[0].reset();
    	var idUser = $(this).attr('data-id');
    	$.ajax({
    		url: '{{route("load-hoc-vien-sua")}}',
    		data: {
    			idUser:idUser
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(data){
    			$('#id-tai-khoan-sua').val(data['taikhoan']['id']);
    			$('#ma-hoc-vien-sua').val(data['hocvien']['ma_hoc_vien']);
					$('#ho-ten-sua').val(data['taikhoan']['hoten']);
					$('#gioi-tinh-sua').val(data['taikhoan']['gioi_tinh']);
					$('#nam-sinh-sua').val(data['hocvien']['nam_sinh']);
					$('#noi-sinh-sua').val(data['hocvien']['noi_sinh']);
					$('#di-dong-sua').val(data['taikhoan']['di_dong']);
					$('#chuc-vu-dang-sua').val(data['hocvien']['chuc_vu_dang']);
					$('#chuc-vu-chinh-quyen-sua').val(data['hocvien']['chuc_vu_chinh_quyen']);
					$('#dan-toc-sua').val(data['hocvien']['ma_dan_toc']);
					$('#don-vi-sua').val(data['hocvien']['ma_don_vi']);
					$('#khoa-hoc-sua').val(data['hocvien']['ma_khoa_hoc']);
					$('#tai-khoan-sua').val(data['taikhoan']['username']);
					$('#trang-thai-sua').val(data['hocvien']['state']);

    		}, 
    		error: function(err){       
    			toastr.error("Lỗi! Vui lòng thử lại.");
    			console.log(err);
    		}
    	})
    });

    $('.btn-luu-sua').click(function(){
  		var idTaiKhoan = $('#id-tai-khoan-sua').val();
			var maHocVien = $('#ma-hoc-vien-sua').val();
			var hoTen = $('#ho-ten-sua').val();
			var gioiTinh = $('#gioi-tinh-sua').val();
			var namSinh = $('#nam-sinh-sua').val();
			var noiSinh = $('#noi-sinh-sua').val();
			var diDong = $('#di-dong-sua').val();
			var chucVuDang = $('#chuc-vu-dang-sua').val();
			var chucVuCQ = $('#chuc-vu-chinh-quyen-sua').val();
			var idDanToc = $('#dan-toc-sua').val();
			var idDonVi = $('#don-vi-sua').val();
			var idKhoaHoc = $('#khoa-hoc-sua').val();
			var userName = $('#tai-khoan-sua').val();
			var matKhau = $('#mat-khau-sua').val();
			var state = $('#trang-thai-sua').val();
    	$.ajax({
    		url: '{{route("luu-hoc-vien-sua")}}',
    		data: {
    			idTaiKhoan:idTaiKhoan,
					maHocVien:maHocVien,
					hoTen:hoTen,
					gioiTinh:gioiTinh,
					namSinh:namSinh,
					noiSinh:noiSinh,
					diDong:diDong,
					chucVuDang:chucVuDang,
					chucVuCQ:chucVuCQ,
					idDanToc:idDanToc,
					idDonVi:idDonVi,
					idKhoaHoc:idKhoaHoc,
					userName:userName,
					matKhau:matKhau,
					state:state
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(data){
    			if(data==true){
    				toastr.success("Cập nhật thông tin học viên thành công."); 				
            $('#modal-sua-hoc-vien').modal('hide');
            if($('.chon-khoa-hoc').val()!=-1){
    					$.ajax({
				        url: '{{route("load-hoc-vien-by-khoa-hoc")}}',
				        data: {
				          maKhoaHoc:$('.chon-khoa-hoc').val()
				        },
				        type: "POST",
				        headers: {
				          'X-CSRF-Token': '{{ csrf_token() }}',
				        },
				        success: function(data){
				          toastr.success("Load dữ liệu thành công.");
				          $('#div-danh-sach-hoc-vien').html(data);
				        }, 
				        error: function(err){       
				          toastr.error("Lỗi! Vui lòng thử lại.");
				          console.log(err);
				        }
				      });
    				}
    				else{
	    				$.ajax({
	    					url: '{{route("load-danh-sach-hoc-vien")}}',
	    					type: "GET",
	    					success: function(data){
	    						$('#div-danh-sach-hoc-vien').empty();
	    						$('#div-danh-sach-hoc-vien').html(data);
	    					}, 
	    					error: function(err){       
	    						toastr.error("Lỗi! Vui lòng thử lại.");
	    						console.log(err);
	    					}
	    				})
	    			}
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

    $("#table-hoc-vien").on("click", ".btn-duyet-hoc-vien", function(){
    	var idUsser = $(this).attr('data-id');
    	$.ajax({
    		url: '{{route("duyet-hoc-vien")}}',
    		data: {
    			idUsser:idUsser
    		},
    		type: "POST",
    		headers: {
    			'X-CSRF-Token': '{{ csrf_token() }}',
    		},
    		success: function(data){
    			if(data==true){
    				toastr.success("Duyệt học viên thành công.");
    				if($('.chon-khoa-hoc').val()!=-1){
    					$.ajax({
				        url: '{{route("load-hoc-vien-by-khoa-hoc")}}',
				        data: {
				          maKhoaHoc:$('.chon-khoa-hoc').val()
				        },
				        type: "POST",
				        headers: {
				          'X-CSRF-Token': '{{ csrf_token() }}',
				        },
				        success: function(data){
				          toastr.success("Load dữ liệu thành công.");
				          $('#div-danh-sach-hoc-vien').html(data);
				        }, 
				        error: function(err){       
				          toastr.error("Lỗi! Vui lòng thử lại.");
				          console.log(err);
				        }
				      });
    				}
    				else{
	    				$.ajax({
								url: '{{route("load-danh-sach-hoc-vien")}}',
								type: "GET",
								success: function(data){
									$('#div-danh-sach-hoc-vien').empty();
									$('#div-danh-sach-hoc-vien').html(data);
								}, 
								error: function(err){       
									toastr.error("Lỗi! Vui lòng thử lại.");
									console.log(err);
								}
							})
	    			}
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