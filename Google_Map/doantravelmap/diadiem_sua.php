<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Sửa địa điểm</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Sửa địa điểm</div>
				<div class="card-body">
					<form action="diadiem_sua_xuly.php" method="post" class="needs-validation" novalidate>
						<input type="text" id="id" name="id" hidden />
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
						
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</form>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, doc, collection, getDocs, getDoc } from 'https://www.gstatic.com/firebasejs/9.8.2/firebase-firestore.js';
			const db = getFirestore();
			
			const loaiDiaDiem = await getDocs(collection(db, 'loaidiadiem'));
			var output = '';
			loaiDiaDiem.forEach((d) => {
				output += '<option value="' + d.id + '">' + d.data().TenLoai + '</th>';
			});
			$('#MaLoai').append(output);
			
			const docRef = doc(db, 'diadiem', '<?php echo $_GET['id']; ?>');
			const docSnap = await getDoc(docRef);
			if (docSnap.exists()) {
				const loai = await getDoc(docSnap.data().MaLoai);
				$('#id').val(docSnap.id);
				$('#MaDiaDiem').val(docSnap.data().MaDiaDiem);
				$('#MaLoai').val(loai.id);
				$('#TenDiaDiem').val(docSnap.data().TenDiaDiem);
				$('#ViDo').val(docSnap.data().ToaDo.latitude);
				$('#KinhDo').val(docSnap.data().ToaDo.longitude);
				$('#DiaChi').val(docSnap.data().DiaChi);
				$('#GhiChu').val(docSnap.data().GhiChu);
			} else {
				console.log('No such document!');
			}
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