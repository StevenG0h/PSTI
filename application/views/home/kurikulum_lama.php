<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2><?= $kurikulum->kurikulum ?></h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Map Area -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-6 mt-5 mb-5" style="font-family: Open Sans, sans-serif;">
            <h3>Rincian Kurikulum</h3>
            <img src="<?= base_url('uploads/kurikulum/' . $kurikulum->rincian_kurikulum) ?>" alt="">
        </div>
    </div>

    <!-- Semester 1-8 -->
    <div class="row">
        <?php foreach ($semester as $key => $value) { ?>
            <div class="col-lg-6 col-md-6 mt-3 mb-3" style="font-family: Open Sans, sans-serif;">
                <h3><?= $value->semester ?></h3>
                <img src="<?= base_url('uploads/semester/' . $value->file_gambar) ?>" alt="">
            </div>
        <?php } ?>
    </div>
</div>
<!-- End Map Area -->