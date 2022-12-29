<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
    <div class="container-lg">
        <div class="page-title-content">
            <h2>Profil Program Studi</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<style>
    p img {
        float: left;
    }
</style>

<div class="container-lg">
    <div class="row">
        <div class="col-lg-12 col-md-6 mt-5 mb-5 prodi_profile" style="font-family: Open Sans, sans-serif;">
            <?= $this->db->get('profil_prodi')->row()->isi ?>
        </div>
    </div>
</div>
<style>
</style>