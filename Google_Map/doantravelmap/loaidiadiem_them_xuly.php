<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý thêm loại địa điểm</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Xử lý thêm loại địa điểm</div>
				<div class="card-body">
					
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, doc, setDoc } from 'https://www.gstatic.com/firebasejs/9.8.2/firebase-firestore.js';
			const db = getFirestore();
			await setDoc(doc(db, 'loaidiadiem', '<?php echo str_pad($_POST['MaLoai'], 10, '0', STR_PAD_LEFT); ?>'), {
				MaLoai: <?php echo $_POST['MaLoai']; ?>,
				TenLoai: '<?php echo $_POST['TenLoai']; ?>',
				HinhAnhBanDo: '<?php echo $_POST['HinhAnhBanDo']; ?>'
			});
			location.href = 'loaidiadiem.php';
		</script>
	</body>
</html>