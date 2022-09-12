<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý đăng xuất</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Đang đăng xuất...</div>
				<div class="card-body">
					<?php
						// Xóa SESSION
						unset($_SESSION['uid']);
						unset($_SESSION['email']);

						header('Location: index.php');
					?>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getAuth, signOut } from "https://www.gstatic.com/firebasejs/9.8.2/firebase-auth.js";
			const auth = getAuth();
			signOut(auth).then(() => {
				location.href = 'index.php';
			}).catch((error) => {
				console.log(error.message);
			});

			
		</script>
	</body>
</html>