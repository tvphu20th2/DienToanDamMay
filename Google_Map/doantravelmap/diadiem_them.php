<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Thêm địa điểm</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header bg-info text-white">Thêm địa điểm</div>
				<div class="card-body">
					<form action="diadiem_them_xuly.php" method="post" class="needs-validation" novalidate>
						<div class="mb-3">
							<label for="MaDiaDiem" class="form-label">Mã địa điểm</label>
							<input type="text" class="form-control" id="MaDiaDiem" name="MaDiaDiem" required />
						</div>
						<div class="mb-3">
							<label for="MaLoai" class="form-label">Loại</label>
							<select class="form-select" id="MaLoai" name="MaLoai" required>
								<option value="">-- Chọn --</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="TenDiaDiem" class="form-label">Tên địa điểm</label>
							<input type="text" class="form-control" id="TenDiaDiem" name="TenDiaDiem" required />
						</div>
						<div class="mb-3">
							<label for="ViDo" class="form-label">Vĩ độ</label>
							<input type="text" class="form-control" id="ViDo" name="ViDo" required />
						</div>
						<div class="mb-3">
							<label for="KinhDo" class="form-label">Kinh độ</label>
							<input type="text" class="form-control" id="KinhDo" name="KinhDo" required />
						</div>
						<div class="mb-3">
							<label for="DiaChi" class="form-label">Địa chỉ</label>
							<input type="text" class="form-control" id="DiaChi" name="DiaChi" required />
						</div>
						<div class="mb-3">
							<label for="GhiChu" class="form-label">Ghi chú về địa điểm</label>
							<textarea type="text" class="form-control" id="GhiChu" name="GhiChu"></textarea>
						</div>
						
						<button type="submit" class="btn btn-primary">Thêm mới</button>
					</form>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, collection, getDocs } from 'https://www.gstatic.com/firebasejs/9.8.2/firebase-firestore.js';
			const db = getFirestore();
			const querySnapshot = await getDocs(collection(db, 'loaidiadiem'));
			var output = '';
			querySnapshot.forEach((doc) => {
				output += '<option value="' + doc.id + '">' + doc.data().TenLoai + '</th>';
			});
			$('#MaLoai').append(output);
		</script>
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