<!-- Start Navbar Area -->
<div class="navbar-area">
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
                                    <a href="<?= base_url('home/profil_prodi'); ?>" class="nav-link">Visi Misi</a>
                                </li>
                                <li class="nav-item">
                                <a href="#">
                                    kurikulum
                                    <i class="bx bx-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                <?php foreach($kurikulum as $value): ?>
                                <li class="nav-item">
                                    
                                    <a href="<?= base_url('home/kurikulum/'.$value->id_kurikulum); ?>" class="nav-link"><?= $value->kurikulum ?></a>
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
                                    <a href="<?= base_url('home/profil_dosen'); ?>" class="nav-link">Profil Dosen</a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('home/profil_asisten'); ?>" class="nav-link">Profil Asisten</a>
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