<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Bản đồ dịa điểm du lịch</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
			<style>
			div.a{
				text-align: center;
			}
			</style>
			
			<div class ="a">
			<div class="card-header bg-warning text-dark">Bản đồ hiển thị các địa điểm</div>
				<div class="card-body p-0">
					<div id="myMap" style="position:relative;width:100%;height:580px;"></div>
				</div>
			</div>
			</div>

			
			
			<!-- Footer -->
			<?php include 'footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script src="https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AhEhTZ7FhjvBBhTFwkgpQs2KNtwM_G4hnYuiUtxFVej2TjrrgF9wTpaN2MdOWNSb" async defer></script>
		<script type="module">
			import { getFirestore, collection, getDocs, getDoc } from 'https://www.gstatic.com/firebasejs/9.8.2/firebase-firestore.js';
			const db = getFirestore();
			
			async function getDanhSachDiaDiem() {
				const querySnapshot = await getDocs(collection(db, 'diadiem'));
				const promises = querySnapshot.docs.map(doc => getRefData(doc));
				return Promise.all(promises)
			}
			
			async function getRefData(doc) {
				var diaDiem = doc.data();
				diaDiem.id = doc.id;
				var loaiDiaDiem = await getDoc(diaDiem.MaLoai);
				diaDiem.Loai = { ...loaiDiaDiem.data() };
				return diaDiem;
			}
			
			// Khai báo biến toàn cục
			window.getDanhSachDiaDiem = getDanhSachDiaDiem;
		</script>
		<script>
			var map, infobox;
			
			function GetMap() {
				map = new Microsoft.Maps.Map('#myMap', {
					center: new Microsoft.Maps.Location(10.3783695, 105.439578),
					zoom: 10
				});
				
				infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
					visible: false
				});
				
				infobox.setMap(map);
				
				getDanhSachDiaDiem().then(results => {
					results.forEach((d) => {
						var image = '';
						if(d.Loai.MaLoai == 1)
							image = 'images/beach.png';
						else if(d.Loai.MaLoai == 2)
							image = 'images/mountain.png';
						else
							image = 'images/pagoda.png';
						var loc = new Microsoft.Maps.Location(d.ToaDo.latitude, d.ToaDo.longitude)
						var pin = new Microsoft.Maps.Pushpin(loc, {
							icon: image
						});
						pin.metadata = {
							title: d.TenDiaDiem,
							description: 'Địa chỉ: ' + d.DiaChi
						};
						Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);
						map.entities.push(pin);
					});
				});
			}
			
			function pushpinClicked(e) {
				if (e.target.metadata) {
					infobox.setOptions({
						location: e.target.getLocation(),
						title: e.target.metadata.title,
						description: e.target.metadata.description,
						visible: true
					});
				}
			}
		</script>
	</body>
</html>