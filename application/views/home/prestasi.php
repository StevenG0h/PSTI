<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>PRESTASI</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Area -->
<section class="blog-area ptb-100">
    <div class="container-lg">
        <div class="section-title">
            <!-- <span class="top-title">News Feeds</span> -->
            <!-- <h2>Get The Latest News</h2> -->
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php foreach($artikel as $a): ?>
                <div class="col-lg-4 ">
                            <div class="single-blog ">
                                
                                <a class="blog-image" href="<?= base_url('home/prestasi_detail/'.$a['id_artikel']) ?>">
                                    <img src="<?= base_url('uploads/artikel/' . $a['gambar_artikel']) ?>" alt="Image">
                                </a>
        
                                <div class="">
                                <ul class="d-flex flex-row gap-3 my-2">
                                <li>
                                    <i class="flaticon-user"></i>
                                    <a href="#">Admin</a>
                                </li>
                                <li>
                                    <i class="flaticon-calendar"></i>
                                    <?= $a['tanggal_artikel'] ?>
                                </li>
                            </ul>
        
                                    <a href="<?= base_url('home/prestasi_detail/'.$a['id_artikel']) ?>">
                                        <h3><?= substr(strip_tags($a['judul_artikel']), 0, 50) ?>...</h3>
                                    </a>
        
                                    <p><?= substr(strip_tags($a['isi_artikel']), 0, 100) ?>...</p>
                                
                                    <a href="<?= base_url('home/prestasi_detail/'.$a['id_artikel']) ?>" class="read-more">
                                    <button class="btn btn-dark btn-sm">Selengkapnya...</button> 
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                </div>
            </div>
            <div class="col-md-3 col-12">
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
                            <?php foreach($artikels as $a): ?>
                            <a href="<?= base_url("home/berita/".$a) ?>">
                                <li class="list-group-item"><?= $a ?></li>
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
                            <a href="<?= base_url("home/berita/".$p) ?>">
                                <li class="list-group-item"><?= $p ?></li>
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
                            <a href="<?= base_url("home/kurikulum/".$kur->id_kurikulum) ?>">
                                <li class="list-group-item"><?= $kur->kurikulum ?></li>
                            </a>
                            <?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
        </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->