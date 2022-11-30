<!-- Start Page Title Area -->
<div class="page-title-area bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2><?= $heading ?></h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Details Area -->
<div class="blog-details-area ptb-100">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-details-wrap">
                    <div class="blog-top-content-wrap">
                        <img src="<?= base_url('uploads/artikel/' . $artikel_detail->gambar_artikel) ?>" alt="Image">

                        <ul class="post-details">
                            <li>
                                <i class="bx bx-user"></i>
                                By Admin
                            </li>
                            <li>
                                <i class="bx bx-calendar"></i>
                                <?= $artikel_detail->tanggal_artikel ?>
                            </li>
                        </ul>

                        <h3><?= $artikel_detail->judul_artikel ?></h3>

                        <p><?= $artikel_detail->isi_artikel ?></p>

                    </div>
                    <div class="tags-and-shear-wrap">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="tag-list">
                                    <li>
                                        <span>Bagikan ke</span>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/share?text=<?= $artikel_detail->judul_artikel ?>&url=<?= base_url('home/berita_detail/'.$artikel_detail->id_artikel) ?>" target="_blank">
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?text=<?= base_url('home/berita_detail/'.$artikel_detail->id_artikel) ?>" target="_blank">
                                            <i class="bx bxl-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/sharer.php?u=<?= base_url('home/berita_detail/'.$artikel_detail->id_artikel) ?>&t=<?= $artikel_detail->judul_artikel ?>" target="_blank">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
</div>
<!-- End Blog Details Area -->