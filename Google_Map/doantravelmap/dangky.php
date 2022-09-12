<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Đăng ký</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header bg-info text-white">Vui lòng nhập đầy đủ thông tin dưới đây để đăng ký</div>
				<div class="card-body">
					<form action="dangky_xuly.php" method="post" class="needs-validation" novalidate>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" required />
							<div class="invalid-feedback">Email không được bỏ trống!</div>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Mật khẩu</label>
							<input type="password" class="form-control" id="password" name="password" required />
							<div class="invalid-feedback">Mật khẩu không được bỏ trống!</div>
						</div>
						<div class="mb-3">
							<label for="repassword" class="form-label">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" id="repassword" name="repassword" required />
							<div class="invalid-feedback">Nhập lại mật khẩu không được bỏ trống!</div>
						</div>
						
						<button type="submit" class="btn btn-primary">Đăng ký</button>
					</form>
				</div>
			</div>
			
			<!-- Footer:  -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script>
			(function() {
				'use strict';
				var forms = document.querySelectorAll('.needs-validation');
				Array.prototype.slice.call(forms).forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			})();
		</script>
	</body>
</html>