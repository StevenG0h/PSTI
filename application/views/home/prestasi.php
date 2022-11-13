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
    <div class="container">
        <div class="section-title">
            <!-- <span class="top-title">News Feeds</span> -->
            <!-- <h2>Get The Latest News</h2> -->
        </div>

        <div class="row">
            <?php foreach ($artikel as $key => $value) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <a href="<?= base_url('home/prestasi_detail/'.$value->id_artikel) ?>">
                            <img src="<?= base_url('uploads/artikel/' . $value->gambar_artikel) ?>" alt="Image">
                        </a>

                        <div class="blog-content">
                            <ul>
                                <li>
                                    <i class="flaticon-user"></i>
                                    <a href="#">Admin</a>
                                </li>

                                <li>
                                    <i class="flaticon-calendar"></i>
                                    <?= $value->tanggal_artikel ?>
                                </li>
                            </ul>

                            <a href="<?= base_url('home/prestasi_detail/'.$value->id_artikel) ?>">
                                <h3><?= $value->judul_artikel ?></h3>
                            </a>

                            <p><?= substr(strip_tags($value->isi_artikel), 0, 200) ?>...</p>
                        
                            <a href="<?= base_url('home/prestasi_detail/'.$value->id_artikel) ?>" class="read-more">
                            <button class="btn btn-dark btn-sm">Selengkapnya...</button> 
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Blog Area -->