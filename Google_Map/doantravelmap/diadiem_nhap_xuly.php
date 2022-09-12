<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý nhập địa điểm từ Excel</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Xử lý nhập địa điểm từ Excel</div>
				<div class="card-body">
					<?php
						// Xử lý tập tin Excel
						require 'vendor/autoload.php';
						$file = $_FILES['TapTin']['tmp_name'];
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
						$reader->setReadDataOnly(true);
						$spreadsheet = $reader->load($file);
						$sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
						$data = $sheet->toArray();
					?>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, doc, writeBatch, GeoPoint } from 'https://www.gstatic.com/firebasejs/9.8.2/firebase-firestore.js';
			const db = getFirestore();
			const batch = writeBatch(db);
			
			<?php
				foreach($data as $key => $value)
				{
			?>
					const refData<?php echo $key; ?> = doc(db, 'loaidiadiem', '<?php echo $value[3]; ?>');
					const docData<?php echo $key; ?> = doc(db, "diadiem", '<?php echo str_pad($value[0], 10, '0', STR_PAD_LEFT); ?>');
					var data<?php echo $key; ?> = {
						MaDiaDiem: <?php echo $value[0]; ?>,
						MaLoai: refData<?php echo $key; ?>,
						TenDiaDiem: '<?php echo $value[1]; ?>',
						ToaDo: new GeoPoint(<?php echo $value[4]; ?>, <?php echo $value[5]; ?>),
						DiaChi: '<?php echo $value[6]; ?>',
						GhiChu: ''
					};
					batch.set(docData<?php echo $key; ?>, data<?php echo $key; ?>);
			<?php
				}
			?>
			
			await batch.commit();
			location.href = 'diadiem.php';
		</script>
	</body>
</html>