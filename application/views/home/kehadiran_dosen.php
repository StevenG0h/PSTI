<!-- Start Page Title Area -->

<!-- <div class="page-title-area bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>KEHADIRAN DOSEN</h2>
        </div>
    </div>
</div> -->

<!-- End Page Title Area -->

<!-- Start Team Area -->
<section class="team-page-area bg-color pt-70 pb-70" style="min-height:100vh;">
    <div class="m-5 align-content-center">
        <div class="section-title">
            <!-- <h2>KEHADIRAN DOSEN</h2> -->
        </div>

        <style>
            .font-p {
                font-size: 26px;
            }
        </style>
        <div class="row">
            <?php foreach ($kehadiran_dosen as $key => $value) { 
            ?>
            <div class="col-lg-3 col-sm-6 p-3">
                <div class="card mb-3 h-100 d-flex flex-column " style="max-width: 500px;">
                    <!-- <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('uploads/dosen/'.$value->gambar_dosen) ?>" class="card-img" alt="...">
                        </div> -->
                        <div class="col-md-12 d-flex flex-column justify-content-between h-100" style="padding: 0px;">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size:1.5rem"><?= $value->nama_dosen ?></h4>
                                <?php
                                    if ($value->status == "Hadir") {
                                        $color = 'green';
                                    } else if ($value->status == "Tidak Hadir") {
                                        $color = 'red';
                                    }
                                ?>
                                <p class="card-text font-p" style="font-size:1.2rem;margin-bottom:0px;margin-top:auto;"><i class="bx bxs-circle" style="color:<?=$color?>;"></i>&nbsp;<?= $value->status ?> <br /><?= $value->keterangan ?></p>
                            </div>
                            <div class="card-footer align-self-end mt-auto w-100">
                                <p class="text-right font-p" style="font-size: 1.2rem;"><small class="text-muted">Terakhir diperbaharui <b><?= date("H:i, d F Y",strtotime($value->last_updated)) ?></b></small></p>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Team Area -->