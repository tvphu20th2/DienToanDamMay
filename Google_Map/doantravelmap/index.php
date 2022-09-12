<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Trang Web hiển thị dịa điểm du lịch</title>
		<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	</head>
	<body>
		

		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<!--<div class="card-header">Trang chủ</div>-->
				<div class="card-header bg-info text-white">Trang chủ</div>
				<div class="card-body">
					<p class="card-text">Trang chủ đã cập nhật.</p> 
					
				</div>

						


			</div>

			
			

			
			
			<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="10" width="100%">Đồ án báo cáo Xây dựng trang Web hiển thị các địa điểm du lịch. Thành viên nhóm: Nguyễn Quí Năng, Tạ Văn Phú, Mai Hiếu Nghĩa - DH20TH2</marquee>
			
					
			

			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		
			
		<?php include 'javascript.php'; ?>
	</body>
</html>