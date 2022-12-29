<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>PROFIL DOSEN</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Team Area -->
<section class="team-page-area bg-color ptb-100">
    <div class="container-lg">
        <!-- <div class="section-title">
            <h2>DOSEN PROGRAM STUDI TEKNIK INFORMATIKA</h2>
        </div> -->

        <div class="row">
            <?php foreach ($dosen as $key => $value) { ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="ingle-team">

                        <div class="team-img">
                            <div class="team-img-item">
                                <img  src="<?= base_url('uploads/dosen/' . $value->gambar_dosen) ?>" alt="Image">
                            </div>
                            <ul class="social">
                                <li>
                                    <a href="https://bp2m.pcr.ac.id/index.php/main/detaildosen/<?= $value->inisial_dosen ?>">
                                        <button class="btn btn-primary btn-sm">BP2M</button>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="team-content">
                            <h3><?= $value->nama_dosen ?> </h3>
                            <table class="table table-responsive text-start">
                                <tr>
                                    <td>NIP</td>
                                    <td>:</td>
                                    <td><?= $value->nip_dosen ?></td>
                                    
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $value->email_dosen ?></td>
                                </tr>
                                <tr>
                                    <td>Kompetensi</td>
                                    <td>:</td>
                                    <td><?= $value->kompetensi_dosen ?></td>
                                </tr>
                                <tr>
                                    <td>Mata Kuliah</td>
                                    <td>:</td>
                                    <td><?= $value->makul_dosen ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan Fungsional</td>
                                    <td>:</td>
                                    <td><?= $value->jabatan_fungsional ?>/<?= $value->pangkat ?></td>
                                </tr>
                                <tr>
                                    <td>Sertifikat</td>
                                    <td>:</td>
                                    <td><?= $value->sertifikat_pendidik ?></td>
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