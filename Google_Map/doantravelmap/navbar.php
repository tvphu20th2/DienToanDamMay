<nav class="navbar navbar-expand-sm navbar-dark bg-info">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Travel MAP</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="bando.php">Bản đồ</a>
				</li>
				<?php
					session_start();
					if(!isset($_SESSION['uid'])) {
				?>
						
						<li class="nav-item">
							<a class="nav-link" href="dangky.php">Đăng ký</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="dangnhap.php">Đăng nhập</a>
						</li>
				<?php
					} else {
				?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Quản lý
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="loaidiadiem.php">Loại địa điểm</a></li>
								<li><a class="dropdown-item" href="diadiem.php">Địa điểm</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="taikhoan.php">Tài khoản đăng nhập</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="dangxuat.php"><?php echo $_SESSION['email'] ?> [Đăng xuất]</a>
						</li>
				<?php
					}
				?>
			</ul>
			<!--
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Tìm kiếm địa điểm" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Tìm</button>
				
					
					
					
			</form>
				-->
			

			<section class="search">
				<div classs = "wraper">
				
					<div class="search-content-items right">
						<div class="search-content-item">
							<i class="fas fa-map-marker-alt"></i>
							<input class ="input-search" class="form-control me-2" type="search" placeholder="Tìm kiếm địa điểm" aria-label="Search">
							
							

						</div>
					</div>
				</div>
				
				<div class = "search-content-item">
					<button class="btn btn-outline-success text-white" type="submit">Tìm Kiếm</button>
				
				</div>	
			</section>
		</div>
	</div>
</nav>