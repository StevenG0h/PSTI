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
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
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
        </div>
    </div>
</div>
<!-- End Blog Details Area -->