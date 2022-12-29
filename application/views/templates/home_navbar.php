<!-- Start Navbar Area -->
<div class="navbar-area d-none d-lg-block">
	<!-- Menu For Mobile Device -->
	<div class="container-lg mobile-nav">
		<a href="<?= base_url('home/index') ?>" style="max-width: 200px;" class="logo">
			<img src="<?= base_url('front-end/') ?>assets/img/logo-3.png" alt="Logo">
			<img src="<?= base_url('front-end/') ?>assets/img/logo-2.png" alt="Logo">
		</a>
	</div>

	<!-- Menu For Desktop Device -->
	<div class="main-nav">
		<div class="container-fluid">
			<div class="container-lg ">
				<nav class="navbar navbar-expand-md">
					<a class="navbar-brand" href="<?= base_url('home/index') ?>">
						<img src="<?= base_url('front-end/') ?>assets/img/logo-3.png" alt="Logo">
					</a>
					<a class="navbar-brand" href="<?= base_url('home/index') ?>">
						<img src="<?= base_url('front-end/') ?>assets/img/logo-2.png" alt="Logo">
					</a>

					<div class="collapse navbar-collapse justify-content-end">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a href="<?= base_url('home/index') ?>" class="nav-link">
									Beranda
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('home/berita'); ?>" class="nav-link">
									Berita
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									Program Studi
									<i class="bx bx-chevron-down"></i>
								</a>

								<ul class="dropdown-menu">
									<li class="nav-item">
										<a href="<?= base_url('home/profil_prodi'); ?>" class="nav-link">Profil
											Prodi</a>
									</li>
									<li class="nav-item">
										<a href="#">
											Kurikulum
											<i class="bx bx-chevron-down"></i>
										</a>
										<ul class="dropdown-menu">
											<?php foreach($kurikulum as $value): ?>
											<li class="nav-item">

												<a href="<?= base_url('home/kurikulum/'.$value->id_kurikulum); ?>"
													class="nav-link"><?= $value->kurikulum ?></a>
											</li>
											<?php endforeach; ?>
										</ul>
									</li>

									<li class="nav-item">
										<a href="<?= base_url('home/prestasi'); ?>" class="nav-link">Prestasi</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									Staff Pengajar
									<i class="bx bx-chevron-down"></i>
								</a>

								<ul class="dropdown-menu">
									<li class="nav-item">
										<a href="<?= base_url('home/profil_dosen'); ?>" class="nav-link">Profil
											Dosen</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('home/profil_asisten'); ?>" class="nav-link">Profil
											Asisten</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('home/kehadiran_dosen'); ?>" class="nav-link">Kehadiran Dosen</a>
							</li>

							<li class="nav-item">
								<a href="<?= base_url('home/kontak'); ?>" class="nav-link">Kontak</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('auth'); ?>" class="nav-link">Login</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>

		</div>
	</div>
</div>
<!-- End Navbar Area -->

<nav class="navbar navbar-expand-lg bg-white position-sticky sticky-top d-md-none">
	<div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('home/index') ?>">
						<img src="<?= base_url('front-end/') ?>assets/img/logo-3.png" alt="Logo">
					</a>
					<a class="navbar-brand" href="<?= base_url('home/index') ?>">
						<img src="<?= base_url('front-end/') ?>assets/img/logo-2.png" alt="Logo">
					</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a href="<?= base_url('home/index') ?>" class="nav-link">
						Beranda
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('home/berita'); ?>" class="nav-link">
						Berita
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">
						Program Studi
					</a>
					<ul class="dropdown-menu border-0 py-0 ps-3">
						<li class="nav-item">
							<a href="<?= base_url('home/profil_prodi'); ?>" class="nav-link">Profil Prodi</a>
						</li>
						<li class="nav-item">
							<a href="#" role="button">
								Kurikulum
								<i class="bx bx-chevron-down"></i>
							</a>
							<ul class="">
								<?php foreach($kurikulum as $value): ?>
								<li class="nav-item ms-3">
									<a href="<?= base_url('home/kurikulum/'.$value->id_kurikulum); ?>"
										class="nav-link"><?= $value->kurikulum ?></a>
								</li>
								<?php endforeach; ?>
							</ul>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('home/prestasi'); ?>" class="nav-link">Prestasi</a>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">
						Staff Pengajar
					</a>
					<ul class="dropdown-menu border-0 py-0 ms-3">
						<li class="nav-item">
							<a href="<?= base_url('home/profil_dosen'); ?>" class="nav-link fw-normal">Profil Dosen</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('home/profil_asisten'); ?>" class="nav-link fw-normal">Profil Asisten</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('home/kehadiran_dosen'); ?>" class="nav-link">Kehadiran Dosen</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('home/kontak'); ?>" class="nav-link">Kontak</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('auth'); ?>" class="nav-link">Login</a>
				</li>
		</div>
	</div>
</nav>
