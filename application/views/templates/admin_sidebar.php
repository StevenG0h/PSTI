<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/artikel') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin PSTI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/artikel') ?>">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Artikel</span></a>
    </li>
    <?php if($this->session->userdata('level') == 0): ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-book"></i>
            <span>Kurikulum</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/kurikulum') ?>">Kurikulum</a>
                <a class="collapse-item" href="<?= base_url('admin/profil_lulusan') ?>">Profil Lulusan</a>
                <a class="collapse-item" href="<?= base_url('admin/capaian_pembelajaran') ?>">Capaian Pembelajaran</a>
            </div>
        </div>
    </li>
    
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/kurikulum') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Kurikulum</span></a>
    </li> -->
    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Staff Pengajar</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/dosen') ?>">Dosen</a>
                <a class="collapse-item" href="<?= base_url('admin/asisten_dosen') ?>">Asisten Dosen</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/akun_dosen') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Akun Dosen</span></a>
    </li>
    <?php endif; ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/kehadiran') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Kehadiran </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->