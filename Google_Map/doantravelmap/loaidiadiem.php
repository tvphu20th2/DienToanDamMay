<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Loại địa điểm</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header bg-info text-white mb-2">Loại địa điểm</div>
				<div class="card-body">
					<a href="loaidiadiem_them.php" class="btn btn-success mb-2">Thêm mới</a>
					<table class="table table-bordered table-hover table-sm mb-0">
						<thead>
							<tr>
								<th width="10%">Mã loại</th>
								<th width="50%">Tên loại</th>
								<th width="30%">Hình ảnh bản đồ</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
							</tr>
						</thead>
						<tbody id="HienThi">
							
						</tbody>
					</table>
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
				output += '<tr>';
					output += '<td class="align-middle">' + doc.data().MaLoai + '</td>';
					output += '<td class="align-middle">' + doc.data().TenLoai + '</td>';
					output += '<td class="align-middle text-center"><img src="images/' + doc.data().HinhAnhBanDo + '"></td>';
					output += '<td class="align-middle text-center"><a href="loaidiadiem_sua.php?id=' + doc.id + '">Sửa</a></td>';
					output += '<td class="align-middle text-center"><a onclick="return confirm(\'Bạn có muốn xóa loại địa điểm ' + doc.data().TenLoai + ' không?\')" href="loaidiadiem_xoa.php?id=' + doc.id + '">Xóa</a></td>';
				output += '</tr>';
			});
			$('#HienThi').html(output);
		</script>
	</body>
</html>