<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý đăng ký</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Xử lý đăng ký</div>
				<div class="card-body">
					<div id="ThanhCong" class="alert alert-success alert-dismissible fade show mb-0" role="alert">
						<div id="ThongBaoThanhCong"></div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<div id="ThatBai" class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
						<div id="ThongBaoThatBai"></div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
			
			<!-- Footer-->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getAuth, createUserWithEmailAndPassword } from 'https://www.gstatic.com/firebasejs/9.8.2/firebase-auth.js';
			const auth = getAuth();
			
			$('#ThanhCong').hide();
			$('#ThatBai').hide();
			
			var email = '<?php echo $_POST['email']; ?>';
			var password = '<?php echo $_POST['password']; ?>';
			var repassword = '<?php echo $_POST['repassword']; ?>';
			
			if(email == '' || password == '' || password != repassword)
			{
				$('#ThatBai').show();
				$('#ThongBaoThatBai').html('Thông tin đăng ký không hợp lệ.');
			} else {
				createUserWithEmailAndPassword(auth, email, password)
				.then((userCredential) => {
					$('#ThanhCong').show();
					$('#ThongBaoThanhCong').html('Đã đăng ký thành công.');
				})
				.catch((error) => {
					$('#ThatBai').show();
					$('#ThongBaoThatBai').html(error.message);
				});
			}
		</script>
	</body>
</html>