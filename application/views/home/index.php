<!-- Start Hero Slider Area -->
<section class="hero-slider-area">
    <div class="hero-slider-wrap owl-theme owl-carousel" data-slider-id="1">
        <!-- start loop -->
        <?php
        foreach ($slider as $key => $value) {
        ?>
            <div class="hero-slider-item" style="background-image: url(<?= base_url('uploads/artikel/' . $value->gambar_artikel) ?>);">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="hero-slider-text">

                                <!-- <h1>Selamat Datang di Program Studi Teknik Informatika</h1>
                            <p>VidNext is a high-quality video production house!</p>

                            <div class="slider-btn">
                                <a href="about.html" class="default-btn">
                                    View More
                                </a>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end loop -->
        <?php } ?>
    </div>

    <!-- Start Carousel Thumbs -->
    <div class="thumbs-wrap">
        <div class="owl-thumbs hero-slider-thumb" data-slider-id="1">
            <?php
            $i = 1;
            foreach ($slider as $key => $value) {
            ?>
                <div class="owl-thumb-item">
                    <span><?= $i++ ?></span>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Carousel Thumbs -->
</section>
<!-- End Hero Slide Area -->

<!-- Start About Area Sambutan -->
<section class="about-area-two bg-color ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="about-content">
                    <h2 class='text-center'>Selamat Datang di Program Studi Teknik Informatika</h2>
                    <p class='text-center'>Kampus Bebas Asap Rokok, Ramah Lingkungan dan Tertib lalu lintas. PCR memiliki Misi untuk Menyelenggarakan Sistem Pendidikan Vokasi yang berkualitas dengan menghasilkan lulusan yang profesional. Terbaik sejak tahun 2015, 2016, 2017 dan 2019 berdasarkan SK Pemeringkatan Perguruan Tinggi Kementerian Riset Teknologi dan Pendidikan Tinggi.</p>
                    <p class="text-center font-italic">"Empowers You to Global Competition"</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area Two -->

<!-- Start What We Do Area -->
<section class="what-we-do-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="what-we-do-item">
                    <h3>Pilihan Program Pendidikan</h3>
                    <p>Temukan program pendidikan dan bidang studi yang sesuai dengan minat belajar Anda</p>
                    <a href="https://pcr.ac.id"><button class="btn btn-dark">Informasi selengkapnya</button></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="what-we-do-item">
                    <h3>Penerimaan Mahasiswa Baru</h3>
                    <p>Sudah punya pilihan program pendidikan? Daftarkan diri Anda sekarang</p>
                    <a href="https://pmb.pcr.ac.id"><button class="btn btn-dark">Informasi selengkapnya</button></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-0">
                <div class="what-we-do-item">
                    <h3>Informasi Beasiswa</h3>
                    <p>Informasi tentang berbagai skema beasiswa yang ditawarkan untuk mahasiswa baru</p>
                    <a href="mailto:nabila@pcr.ac.id"><button class="btn btn-dark">Informasi selengkapnya</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End What We Do Area -->

<!-- Start About Area Visi Misi -->
<section class="about-area-two bg-color ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="about-content text-center">
                    <h2>VISI DAN MISI</h2>
                    <p>Diakui sebagai Program Studi Unggul yang mampu bersaing dalam Bidang Teknologi Informasi pada tingkat Nasional maupun ASEAN pada tahun 2031</p>
                    <a class="mt-3" href="<?= base_url('home/profil_prodi') ?>"><button class="btn btn-dark ">Informasi selengkapnya</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area Two -->

<!-- Start About Area Visi Misi -->
<section class="about-area-two ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="about-content text-center">
                    <h2>Artikel Terbaru</h2>
                    <div class="row">
                        <?php foreach ($artikel as $key => $value) { ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-blog">
                                    <a href="<?= base_url('home/berita_detail/' . $value->id_artikel) ?>">
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

                                        <a href="<?= base_url('home/berita_detail/' . $value->id_artikel) ?>">
                                            <h3><?= $value->judul_artikel ?></h3>
                                        </a>

                                        <p><?= substr(strip_tags($value->isi_artikel), 0, 200) ?>...</p>

                                        <a href="<?= base_url('home/berita_detail/' . $value->id_artikel) ?>" class="read-more">
                                            <button class="btn btn-dark btn-sm">Selengkapnya...</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area Two -->

<!-- Start About Area Visi Misi -->
<section class="about-area-two bg-color ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="about-content text-center">
                    <h2>SOCIAL MEDIA</h2>
                    <a class="bx bxl-instagram bx-lg" href="https://www.instagram.com/psti.pcr/"></a>
                    <a class="bx bxl-youtube bx-lg" href="https://www.youtube.com/channel/UC2sqb5digMyIMw79Nij9Ajw"></a>
                    <a class="bx bxl-facebook bx-lg" href="https://www.facebook.com/D4TeknikInformatikaPCR"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area Two -->

<!-- Start Partner Area -->
<!--<div class="partner-area-two ptb-100">-->
<!--    <div class="container">-->
<!--        <div class="partner-wrap owl-theme owl-carousel">-->
<!--            <div class="partner-item">-->
<!--                <a href="#">-->
<!--                    <img src="<?= base_url('front-end/') ?>assets/img/partner-logo/7.png" alt="Image">-->
<!--                </a>-->
<!--            </div>-->

<!--            <div class="partner-item">-->
<!--                <a href="#">-->
<!--                    <img src="<?= base_url('front-end/') ?>assets/img/partner-logo/8.png" alt="Image">-->
<!--                </a>-->
<!--            </div>-->

<!--            <div class="partner-item">-->
<!--                <a href="#">-->
<!--                    <img src="<?= base_url('front-end/') ?>assets/img/partner-logo/9.png" alt="Image">-->
<!--                </a>-->
<!--            </div>-->

<!--            <div class="partner-item">-->
<!--                <a href="#">-->
<!--                    <img src="<?= base_url('front-end/') ?>assets/img/partner-logo/10.png" alt="Image">-->
<!--                </a>-->
<!--            </div>-->

<!--            <div class="partner-item">-->
<!--                <a href="#">-->
<!--                    <img src="<?= base_url('front-end/') ?>assets/img/partner-logo/11.png" alt="Image">-->
<!--                </a>-->
<!--            </div>-->

<!--            <div class="partner-item">-->
<!--                <a href="#">-->
<!--                    <img src="<?= base_url('front-end/') ?>assets/img/partner-logo/12.png" alt="Image">-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- End Partner Area -->