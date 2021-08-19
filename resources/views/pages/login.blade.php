<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập - Quản lý học viên</title>

	@include('layouts/stylesheet')
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h2"><b>TRƯỜNG CHÍNH TRỊ</b></a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Vui lòng đăng nhập để sử dụng</p>

				<form action="javascript:void(0);">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Tên đăng nhập" id="ten-dang-nhap" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Mật khẩu" id="mat-khau" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Ghi nhớ
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-6">
							<button type="submit" class="btn btn-primary btn-block btn-dang-nhap">Đăng nhập</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<div class="social-auth-links text-center mt-2 mb-3">
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
					</a>
				</div>
				<!-- /.social-auth-links -->

				<p class="mb-1">
					<a href="forgot-password.html">Quên mật khẩu</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Đăng ký</a>
				</p>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	@include('layouts/script')
	<script type="text/javascript">
		toastr.options = {
	      "debug": false,
	      "positionClass": "toast-bottom-right",
	      "onclick": null,
	      "fadeIn": 300,
	      "fadeOut": 1000,
	      "timeOut": 5000,
	      "extendedTimeOut": 1000
	    }

		$('.btn-dang-nhap').click(function(){
			var tenDangNhap = $('#ten-dang-nhap').val();
			var matKhau = $('#mat-khau').val();
			if(!tenDangNhap||!matKhau){
				toastr.warning("Vui lòng nhập đầy đủ thông tin.");
			}
			else{
				$.ajax({
					url: '{{route("check-login")}}',
					data: {
						username:tenDangNhap,
						password:matKhau
					},
					type: "POST",
					headers: {
						'X-CSRF-Token': '{{ csrf_token() }}',
					},
					success: function(data){
						if(data==true){
							window.location.href = '{{route("trang-chu")}}';
						}
						else{
							toastr.warning("Tài khoản hoặc mật khẩu không đúng.");
						}
					}, 
					error: function(err){				
						alert("Lỗi! Vui lòng thử lại.");
						console.log(err);
					}

				});
			}
		});
	</script>
</body>
</html>
