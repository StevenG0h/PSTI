<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
	<div class="container">
		<div class="page-title-content">
			<h2>KURIKULUM</h2>
		</div>
	</div>
</div>
<!-- End Page Title Area -->

<!-- Start Map Area -->
<div class="container-lg">
	<div class="row">
		<div class="col-md-9 col-12 mt-5 mb-5" style="font-family: Open Sans, sans-serif;">
			<h3>Profil Lulusan Program Studi Teknik Informatika</h3>
			<table class="table table-responsive table-bordered font-weight-normal">
				<tr class="text-center">
					<th>NO</th>
					<th>PROFIL LULUSAN</th>
					<th>DESKRIPSI</th>
					<th>KEMAMPUAN</th>
				</tr>
				<?php

                $i = 1;
                foreach ($profil_lulusan as $key => $value) { ?>

				<tr>
					<td><?= $i++ ?></td>
					<td><?= $value->profil_lulusan ?></td>
					<td><?= $value->deskripsi ?></td>
					<td><?= $value->kemampuan ?></td>
				</tr>

				<?php } ?>
			</table>
			<h3>Capaian Pembelajaran Lulusan Program Studi Teknik Informatika</h3>
			<table class="table table-bordered table-responsive">
				<tr class="text-center">
					<th>NO</th>
					<th>KOMPONEN CP</th>
					<th>KODE</th>
					<th>CAPAIAN PEMBELAJARAN LULUSAN</th>
				</tr>
				<?php

                $i = 1;
                foreach ($capaian_pembelajaran as $key => $value) { ?>

				<tr>
					<td><?= $i++ ?></td>
					<td><?= $value->komponen_capaian_pembelajaran ?></td>
					<td><?= $value->kode ?></td>
					<td><?= $value->capaian_pembelajaran_lulusan ?></td>
				</tr>

				<?php } ?>
			</table>

			<h3>Rincian Kurikulum</h3>
			<img src="<?= base_url('uploads/kurikulum/' . $kurikulum_aktif->rincian_kurikulum) ?>" alt="">
		</div>
		<div class="col-md-3 col-12 mt-5">
			<div class="accordion" id="accordionExample">
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button class="accordion-button" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Berita
						</button>
					</h2>
					<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
						data-bs-parent="#accordionExample">
						<ul class="list-group">
                            <?php foreach($artikel as $a): ?>
                            <a href="<?= base_url("home/berita_detail/".$a['id_artikel']) ?>">
                                <li class="list-group-item"><?= $a['judul_artikel'] ?></li>
                            </a>
                            <?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingTwo">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							Prestasi
						</button>
					</h2>
					<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
						data-bs-parent="#accordionExample">
						<ul class="list-group">
                            <?php foreach($prestasi as $p): ?>
                            <a href="<?= base_url("home/berita_detail/".$p['id_artikel']) ?>">
                                <li class="list-group-item"><?= $p['judul_artikel'] ?></li>
                            </a>
                            <?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingThree">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Kurikulum
						</button>
					</h2>
					<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
						data-bs-parent="#accordionExample">
						<ul class="list-group">
                            <?php foreach($all_kurikulum as $kur): ?>
                            <a href="<?= base_url("home/kurikulum/".$kur['id_kurikulum']) ?>">
                                <li class="list-group-item"><?= $kur['kurikulum'] ?></li>
                            </a>
                            <?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Semester 1-8 -->
	<div class="row">
		<?php foreach ($semester as $key => $value) { ?>
		<div class="col-12 mt-3 mb-3" style="font-family: Open Sans, sans-serif;">
			<h3><?= $value->semester ?></h3>
			<img src="<?= base_url('uploads/semester/' . $value->file_gambar) ?>" alt="">
		</div>
		<?php } ?>
	</div>
<!-- 
	<div class="mb-2">
		<p>Lihat Kurikulum Sebelumnya</p>
		<ol>
			<?php foreach ($kurikulum_tidak_aktif as $key => $value) { ?>
			<li>
				<a href="<?= base_url("home/kurikulum_lama/".$value->id_kurikulum)?>"><?= $value->kurikulum ?></a>
			</li>
			<?php } ?>
		</ol>
	</div> -->

</div>
<!-- End Map Area -->
