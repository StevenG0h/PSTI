<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>PROFIL ASISTEN DOSEN</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Team Area -->
<section class="team-page-area bg-color ptb-100">
    <div class="container">
        <!-- <div class="section-title">
            <h2>Meet The Team</h2>
        </div> -->

        <div class="row">
            <?php foreach ($asisten_dosen as $key => $value) { ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="ingle-team">

                        <div class="team-img">
                            <img src="<?= base_url('uploads/ail/' . $value->gambar_asisten) ?>" alt="Image" style="width:auto ; height:325px">
                        </div>

                        <div class="team-content">
                            <h3><?= $value->nama_asisten ?> </h3>
                            <table class="table table-responsive text-left">
                                <tr>
                                    <td>Mata Kuliah</td>
                                    <td>:</td>
                                    <td><?= $value->makul_asisten ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Team Area -->